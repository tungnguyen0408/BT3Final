<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đặt Bàn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./css/manage_reservation.css">
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
                        <a href="./product.php" class="nav-link">
                            Quản lý sản phẩm
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="./tableForm.php" class="nav-link active">
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

            <!-- Main content -->
            <div class="col-10 main">
                <div class="mt-4 wrapper-content">
                    <h3>Quản lý đặt bàn</h3>
                    <hr class="mt-4" />
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Danh sách đặt bàn</h4>
                            <table class="table" id="reservationTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Bàn</th>
                                        <th>Người dùng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dữ liệu đặt bàn sẽ được tải qua AJAX -->
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center" id="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous"
                                            onclick="loadReservations(currentPage - 1)">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#" onclick="loadReservations(1)">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" onclick="loadReservations(currentPage + 1)"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal sửa trạng thái đặt bàn -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Sửa trạng thái đặt bàn</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="reservation_id" id="reservationId">
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" name="status" id="status">
                                <option value="Chưa xác nhận">Chưa xác nhận</option>
                                <option value="Đã xác nhận">Đã xác nhận</option>
                                <option value="Hủy">Hủy</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal xóa đặt bàn -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa đặt bàn</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="reservation_id" id="deleteReservationId">
                        <p>Bạn có chắc chắn muốn xóa đặt bàn này không?</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    document.querySelector('.btn-danger').addEventListener('click', function() {
        window.location.href = 'logout.php';
    });

    let currentPage = 1;
    const itemsPerPage = 10;

    function editReservation(id, status) {
        document.getElementById('reservationId').value = id;
        document.getElementById('status').value = status;
    }

    function confirmDelete(id) {
        document.getElementById('deleteReservationId').value = id;
    }

    function loadReservations(page = 1) {
        $.ajax({
            url: 'manage_reservations.php',
            method: 'POST',
            data: {
                action: 'load_reservations',
                page: page
            },
            success: function(response) {
                if (response.status === 'success') {
                    const reservations = response.data;
                    let tableRows = '';
                    reservations.forEach(function(reservation) {
                        tableRows += `<tr>
                                        <td>${reservation.id}</td>
                                        <td>${reservation.table_name}</td>
                                        <td>${reservation.username}</td>
                                        <td>${reservation.reservation_date}</td>
                                        <td>${reservation.status}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editReservation(${reservation.id}, '${reservation.status}')">Sửa</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete(${reservation.id})">Xóa</button>
                                        </td>
                                      </tr>`;
                    });
                    $('#reservationTable tbody').html(tableRows);

                    const totalPages = response.total_pages;
                    renderPagination(page, totalPages);
                }
            }
        });
    }
    // Hàm hiển thị phân trang
    function renderPagination(page, totalPages) {
        let paginationHTML = '';
        paginationHTML += `
        <li class="page-item ${page === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" aria-label="Previous" onclick="loadReservations(${page - 1})">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    `;
        for (let i = 1; i <= totalPages; i++) {
            paginationHTML += `
            <li class="page-item ${i === page ? 'active' : ''}">
                <a class="page-link" href="#" onclick="loadReservations(${i})">${i}</a>
            </li>
        `;
        }
        paginationHTML += `
        <li class="page-item ${page === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" aria-label="Next" onclick="loadReservations(${page + 1})">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    `;

        $('#pagination').html(paginationHTML);
    }
    // Xử lý sửa trạng thái đặt bàn
    $('#editForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'manage_reservations.php',
            method: 'POST',
            data: {
                action: 'update_status',
                reservation_id: $('#reservationId').val(),
                status: $('#status').val()
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#editModal').modal('hide');
                    loadReservations(currentPage);
                }
            }
        });
    });

    // Xử lý xóa đặt bàn
    $('#deleteForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'manage_reservations.php',
            method: 'POST',
            data: {
                action: 'delete_reservation',
                reservation_id: $('#deleteReservationId').val()
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#deleteModal').modal('hide');
                    loadReservations(currentPage);
                }
            }
        });
    });

    $(document).ready(function() {
        loadReservations(currentPage);
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>