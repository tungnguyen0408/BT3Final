<?php
include("config.php");
$perPage = 10;

$sql = "SELECT COUNT(*) AS total FROM feedbacks";
$result = $conn->query($sql);
$totalRows = $result->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $perPage);
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
$offset = ($currentPage - 1) * $perPage;
$sql = "SELECT feedbacks.id, users.username, feedbacks.content, feedbacks.rating, feedbacks.created_at 
        FROM feedbacks 
        JOIN users ON feedbacks.user_id = users.id
        LIMIT $perPage OFFSET $offset";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phản hồi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/responses.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 sidebar">
                <h4 class="text-center py-3">ADMIN</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="./home.php" class="nav-link ">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="./product.php" class="nav-link">Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="./tableForm.php" class="nav-link">Quản lý đặt bàn</a>
                    </li>
                    <li class="nav-item">
                        <a href="./responses.php" class="nav-link active">Phản hồi</a>
                    </li>
                    <li class="nav-item">
                        <a href="./user.php" class="nav-link">Tài khoản</a>
                    </li>
                </ul>
                <div class="mt-4 px-3">
                    <button class="btn btn-danger w-100" style="background-color: #e74c3c ">Đăng xuất</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-10 main">
                <div class="mt-4 wrapper-content">
                    <h3>Quản lý phản hồi</h3>
                    <hr class="mt-4" />
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Danh sách phản hồi</h4>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Người dùng</th>
                                        <th>Nội dung</th>
                                        <th>Đánh giá</th>
                                        <th>Thời gian</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr id="feedbackRow-<?= $row['id'] ?>">
                                        <td><?= $row['id'] ?></td>
                                        <td><?= htmlspecialchars($row['username']) ?></td>
                                        <td><?= htmlspecialchars($row['content']) ?></td>
                                        <td><?= $row['rating'] ?> ★</td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm reply-feedback"
                                                data-id="<?= $row['id'] ?>" data-bs-toggle="modal"
                                                data-bs-target="#replyModal">Phản hồi</button>
                                            <button class="btn btn-danger btn-sm delete-feedback"
                                                data-id="<?= $row['id'] ?>" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal">Xóa</button>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Không có phản hồi nào.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- Phân trang -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage - 1 ?>" tabindex="-1">Trang trước</a>
                            </li>

                            <!-- Các trang ở giữa -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $currentPage == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>

                            <li class="page-item <?= $currentPage == $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Trang sau</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Xác nhận Xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận xóa phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa phản hồi này không?
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Phản Hồi -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="replyForm" method="POST" action="send_feedback.php">
                        <input type="hidden" name="feedback_id" value="ID_của_phản_hồi"> <!-- ID phản hồi -->
                        <div class="mb-3">
                            <label for="replyContent" class="form-label">Nội dung phản hồi</label>
                            <textarea class="form-control" id="replyContent" name="replyContent" rows="3"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Gửi phản hồi</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    document.querySelector('.btn-danger').addEventListener('click', function() {
        window.location.href = 'logout.php';
    });

    let feedbackIdToDelete = null;
    $(document).on('click', '.delete-feedback', function() {
        feedbackIdToDelete = $(this).data('id'); // Lưu ID của phản hồi muốn xóa
    });
    $('#confirmDeleteButton').click(function() {
        if (feedbackIdToDelete) {
            $.ajax({
                url: 'delete_feedback.php',
                type: 'POST',
                data: {
                    action: 'delete',
                    id: feedbackIdToDelete,
                    _method: 'DELETE'
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        $('#confirmDeleteModal').modal('hide');
                        $(`#feedbackRow-${feedbackIdToDelete}`).remove();
                    } else {
                        alert(res.error || 'Xóa phản hồi thất bại');
                    }
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi xóa phản hồi');
                }
            });
        }
    });
    </script>
</body>

</html>