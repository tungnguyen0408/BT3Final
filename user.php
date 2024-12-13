<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tài khoản của tôi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/user.css" />
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
                        <a href="./user.php" class="nav-link active">
                            Tài khoản
                        </a>
                    </li>

                </ul>
                <div class="mt-4 px-3">
                    <a href="logout.php" class="btn btn-danger w-100">Đăng xuất</a>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-10 main">
                <div class="mt-4 wrapper-content">
                    <h3>Tài khoản</h3>
                    <hr class="mt-4" />
                    <div class="row mt-4 general-info">
                        <div class="col-12 col-sm-5">
                            <h4>Thông tin chung</h4>
                            <p class="text-body-secondary">
                                Tại đây, bạn có thể tùy chỉnh các thông tin cá nhân cơ bản như
                                họ tên, mật khẩu và cài đặt tài khoản của mình.
                            </p>
                        </div>
                        <div class="col-12 col-sm-7 form-info-user shadow-sm rounded">
                            <form class="form-user">
                                <div class="mb-3">
                                    <label for="name" class="form-label h6">Họ và tên</label>
                                    <input type="text" class="form-control" id="name" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label h6">Địa chỉ email</label>
                                    <input type="email" class="form-control" id="email" disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label h6">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" placeholder="••••••"
                                        disabled />
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEditUserInfo">
                                    Đổi thông tin
                                </button>
                                <button type="button" class="btn btn-danger bg-danger-btn changePasswordBtn"
                                    data-bs-toggle="modal" data-bs-target="#modalChangePassword">
                                    Đổi mật khẩu
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal để đổi mật khẩu -->
    <div class="modal fade" id="modalChangePassword" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="oldPassword" required />
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newPassword" required />
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="confirmPassword" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="updatePasswordBtn" class="btn btn-primary">Cập nhật mật khẩu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Đổi Thông Tin -->
    <div class="modal fade" id="modalEditUserInfo" tabindex="-1" aria-labelledby="modalEditUserInfoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditUserInfoLabel">Đổi thông tin cá nhân</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserInfoForm">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" id="editName" placeholder="Nhập tên mới">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" placeholder="Nhập email mới">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" id="saveChangesBtn" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelector('.btn-danger').addEventListener('click', function() {
            window.location.href = 'logout.php';
        });

        $(document).ready(function() {
            $.get("get_user_info.php", function(data) {
                try {
                    const user = JSON.parse(data);
                    if (user.status === 'success') {
                        $("#name").val(user.username);
                        $("#email").val(user.email);
                    } else {
                        alert("Lỗi: " + user.message);
                    }
                } catch (error) {
                    alert("Lỗi khi lấy thông tin người dùng: " + error.message);
                }
            });

            $("#saveChangesBtn").click(function() {
                const newName = $("#editName").val();
                const newEmail = $("#editEmail").val();

                if (!newName || !newEmail) {
                    alert("Vui lòng điền đầy đủ thông tin");
                    return;
                }

                $.post("update_user_info.php", {
                    username: newName,
                    email: newEmail
                }, function(data) {
                    try {
                        const response = JSON.parse(data);
                        if (response.status === 'success') {
                            location.reload();
                        } else {
                            alert("Có lỗi xảy ra: " + response.message);
                        }
                    } catch (error) {
                        alert("Lỗi khi xử lý phản hồi từ server: " + error.message);
                    }
                }).fail(function() {
                    alert("Có lỗi kết nối, vui lòng thử lại");
                });
            });


            // Đổi mật khẩu
            $("#updatePasswordBtn").click(function(event) {
                event.preventDefault();

                const oldPassword = $("#oldPassword").val();
                const newPassword = $("#newPassword").val();
                const confirmPassword = $("#confirmPassword").val();

                if (!oldPassword || !newPassword || !confirmPassword) {
                    alert("Vui lòng điền đầy đủ thông tin mật khẩu");
                    return;
                }
                if (newPassword !== confirmPassword) {
                    alert("Mật khẩu mới và xác nhận mật khẩu không khớp!");
                    return;
                }
                $.ajax({
                    url: 'update_password.php',
                    type: 'POST',
                    data: {
                        oldPassword: oldPassword,
                        newPassword: newPassword
                    },
                    success: function(data) {
                        try {
                            const response = JSON.parse(data);
                            if (response.status === 'success') {
                                $('#modalChangePassword').modal('hide');
                            } else {
                                alert('Có lỗi xảy ra: ' + response.message);
                            }
                        } catch (error) {
                            alert('Lỗi khi cập nhật mật khẩu: ' + error.message);
                        }
                    },
                    error: function() {
                        alert("Có lỗi kết nối, vui lòng thử lại");
                    }
                });
            });
        });
    </script>
</body>

</html>