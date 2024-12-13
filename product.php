    <?php
    include 'config.php';
    // Tìm kiếm 
    $search_term = isset($_GET['search']) ? $_GET['search'] : '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $products_per_page = 8;
    $offset = ($page - 1) * $products_per_page;

    // Phân trang
    $total_query = "SELECT COUNT(*) AS total FROM products";
    $total_result = $conn->query($total_query);
    if ($total_result) {
        $total_row = $total_result->fetch_assoc();
        $total_products = $total_row['total'];
    } else {
        die("Lỗi truy vấn tổng số sản phẩm: " . $conn->error);
    }

    $total_pages = ceil($total_products / $products_per_page);

    // Truy vấn các sản phẩm cho trang hiện tại
    $query = "SELECT id, name, price, image_url, description FROM products";
    if ($search_term) {
        $query .= " WHERE name LIKE '%" . $conn->real_escape_string($search_term) . "%'";
    }
    $query .= " LIMIT $products_per_page OFFSET $offset";


    $result = $conn->query($query);
    if (!$result) {
        die("Lỗi truy vấn sản phẩm: " . $conn->error);
    }
    ?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý sản phẩm</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/menu.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-2 sidebar">
                    <h4 class="text-center py-3">ADMIN</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="./home.php" class="nav-link ">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./product.php" class="nav-link active">
                                Quản lý sản phẩm
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./tableForm.php" class="nav-link">
                                Quản lý đặt bàn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./responses.php" class="nav-link">
                                Phản hồi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./user.php" class="nav-link">
                                Tài khoản
                            </a>
                        </li>

                    </ul>
                    <div class="mt-4 px-3">
                        <button class="btn btn-danger w-100">Đăng xuất</button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-10 main">
                    <div class="header d-flex align-items-  center justify-content-between">
                        <form method="GET" action="product.php" class="input-group search-bar">
                            <input type="text" class="form-control search-input" name="search"
                                placeholder="Nhập từ khóa tìm kiếm...">
                            <button class="btn btn-outline-primary search-btn" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="content-wrapper mt-4" style="height: 80vh">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3>Danh sách sản phẩm</h3>
                            <!-- Nút mở modal Thêm sản phẩm -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#addProductModal" style="font-size: 20px">
                                Thêm sản phẩm
                            </button>

                        </div>
                        <!-- Hiển thị danh sách sản phẩm -->
                        <div class="row">
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <img src="<?= $row['image_url']; ?>" class="card-img-top"
                                                alt="<?= $row['name']; ?>">

                                            <div class="card-body">
                                                <h5 class="card-title"><?= $row['name']; ?></h5>
                                                <p class="card-text"><?= number_format($row['price']); ?> VND</p>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <!-- Nút Sửa sản phẩm -->
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#editModal<?= $row['id']; ?>">Sửa</button>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $row['id']; ?>">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Thêm Sản Phẩm -->
                                    <div class="modal fade" id="addProductModal" tabindex="-1"
                                        aria-labelledby="addProductModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm mới</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="addProductForm" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <label for="product_name" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="product_name"
                                                                name="name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="product_price" class="form-label">Giá sản phẩm</label>
                                                            <input type="number" class="form-control" id="product_price"
                                                                name="price" step="0.01" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="product_description" class="form-label">Mô tả sản
                                                                phẩm</label>
                                                            <textarea class="form-control" id="product_description"
                                                                name="description" rows="3" required></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="product_image" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="product_image"
                                                                name="product_image" required>
                                                        </div>
                                                        <button type="button" id="submitProduct"
                                                            class="btn btn-primary">Thêm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Sửa Sản Phẩm -->
                                    <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $row['id']; ?>">Chỉnh sửa sản
                                                        phẩm</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editProductForm" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <input type="hidden" name="old_image" value="<?= $row['image_url']; ?>">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" id="name" name="name"
                                                                value="<?= $row['name']; ?>" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Giá sản phẩm</label>
                                                            <input type="number" class="form-control" id="price" name="price"
                                                                value="<?= $row['price']; ?>" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                                                            <textarea class="form-control" id="description" name="description"
                                                                rows="3"
                                                                required><?= htmlspecialchars($row['description']); ?></textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="product_image" class="form-label">Hình ảnh sản
                                                                phẩm</label>
                                                            <input type="file" class="form-control" id="product_image"
                                                                name="product_image">
                                                            <small class="form-text text-muted">Chọn ảnh mới nếu bạn muốn thay
                                                                đổi</small>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Thông Báo Sửa Thành Công -->
                                    <div class="modal fade" id="editSuccessModal" tabindex="-1"
                                        aria-labelledby="editSuccessModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editSuccessModalLabel">Sửa sản phẩm thành công
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="editSuccessMessage">Sản phẩm đã được cập nhật thành công.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="closeEditSuccess"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Thông Báo Thêm sản phẩm -->
                                    <div class="modal fade" id="notificationModal" tabindex="-1"
                                        aria-labelledby="notificationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="notificationModalLabel">Thông Báo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="notificationMessage">Thêm sản phẩm thành công!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                        id="closeNotification">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Xác Nhận Xóa Sản Phẩm -->
                                    <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1"
                                        aria-labelledby="deleteModalLabel<?= $row['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel<?= $row['id']; ?>">Xác nhận xóa
                                                        sản
                                                        phẩm</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa sản phẩm này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Hủy</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="deleteProduct(<?= $row['id']; ?>)">Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Thông Báo Xóa Thành Công -->
                                    <div class="modal fade" id="deleteSuccessModal" tabindex="-1"
                                        aria-labelledby="deleteSuccessModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modal-dialog-centered">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteSuccessModalLabel">Thành công</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sản phẩm đã được xóa thành công!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="col-12 text-center">
                                    <p style="font-weight: 600; font-size: 26px">Không có sản phẩm nào!</p>
                                </div>
                            <?php endif; ?>


                            <!-- Phân trang -->
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                                        <a class="page-link"
                                            href="?page=<?= $page - 1 ?>&search=<?= urlencode($search_term) ?>"
                                            tabindex="-1">Trang trước</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                            <a class="page-link"
                                                href="?page=<?= $i ?>&search=<?= urlencode($search_term) ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= $page == $total_pages ? 'disabled' : '' ?>">
                                        <a class="page-link"
                                            href="?page=<?= $page + 1 ?>&search=<?= urlencode($search_term) ?>">Trang
                                            sau</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script>
            document.querySelector('.btn-danger').addEventListener('click', function() {
                window.location.href = 'logout.php';
            });

            $('#submitProduct').click(function() {
                var formData = new FormData($('#addProductForm')[0]);

                $.ajax({
                    url: 'add_product.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var res = JSON.parse(response);
                            if (res.success) {
                                $('#addProductModal').modal('hide');
                                $('#notificationMessage').text(res.message);
                                $('#notificationModal').modal('show');
                                $('#closeNotification').click(function() {
                                    location.reload();
                                });
                            } else {
                                // Ẩn modal thêm sản phẩm nếu có lỗi
                                $('#addProductModal').modal('hide');
                                // Hiển thị lỗi trong modal thông báo
                                $('#notificationMessage').text(res.message ||
                                    'Thêm sản phẩm thất bại!');
                                $('#notificationModal').modal('show');
                            }
                        } catch (e) {
                            console.error('Lỗi parse JSON:', e);
                            alert('Đã xảy ra lỗi trong xử lý.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi AJAX:', status, error);
                        alert('Đã xảy ra lỗi khi gửi yêu cầu.');
                    }
                });
            });


            $('form[id^="editProductForm"]').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var productId = $(this).find('input[name="id"]').val();
                $.ajax({
                    url: 'update_product.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var res = JSON.parse(response);
                            if (res.success) {
                                // Ẩn modal sửa trước khi hiển thị modal thông báo thành công
                                $('#editModal' + productId).modal(
                                    'hide'); // Ẩn modal sửa theo ID sản phẩm

                                // Đợi một chút để modal sửa ẩn đi hoàn toàn, sau đó hiển thị modal thông báo thành công
                                setTimeout(function() {
                                    $('#editSuccessMessage').text(res
                                        .message); // Cập nhật thông báo
                                    $('#editSuccessModal').modal(
                                        'show'); // Hiển thị modal thông báo sửa thành công
                                }, 300); // Delay 300ms để modal sửa ẩn đi hoàn toàn

                                // Tải lại trang sau một khoảng thời gian (nếu cần)
                                setTimeout(function() {
                                    location.reload();
                                }, 2000); // Sau 2 giây để người dùng thấy thông báo thành công
                            } else {
                                $('#editSuccessMessage').text(res.message);
                                $('#editSuccessModal').modal('show');
                            }
                        } catch (e) {
                            console.error('Lỗi khi xử lý phản hồi JSON:', e);
                            $('#editSuccessMessage').text('Đã xảy ra lỗi trong quá trình xử lý.');
                            $('#editSuccessModal').modal('show');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi AJAX:', status, error);
                        $('#editSuccessMessage').text('Đã xảy ra lỗi khi gửi yêu cầu.');
                        $('#editSuccessModal').modal('show');
                    }
                });
            });

            function deleteProduct(productId) {
                fetch("delete_product.php", {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `delete_id=${productId}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#deleteModal' + productId).modal('hide');
                            $('#deleteSuccessModal').modal('show');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            console.error(data.error || "Xóa thất bại.");
                            alert("Xóa sản phẩm không thành công.");
                        }
                    })
                    .catch(error => {
                        console.error("Lỗi:", error);
                        alert("Đã xảy ra lỗi khi xóa sản phẩm.");
                    });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
        <script src="js/menu.js"></script>
    </body>

    </html>