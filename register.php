<?php
require_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $error_message = "Email đã tồn tại!";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    $error_message = "Đã có lỗi xảy ra. Vui lòng thử lại!";
                }
            }
        } else {
            $error_message = "Mật khẩu và mật khẩu xác nhận không khớp!";
        }
    } else {
        $error_message = "Vui lòng điền đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/login.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .register-card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .register-text {
            margin-bottom: 20px;
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-100">
            <div class="col-12 col-lg-6 mx-auto">
                <div class="card register-card">
                    <h2 class="register-text text-center">Đăng ký</h2>
                    <form action="register.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingUsername" placeholder="Tên người dùng"
                                name="username" required />
                            <label for="floatingUsername">Tên người dùng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com"
                                name="email" required />
                            <label for="floatingEmail">Địa chỉ email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Mật khẩu"
                                name="password" required />
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingConfirmPassword"
                                placeholder="Xác nhận mật khẩu" name="confirm_password" required />
                            <label for="floatingConfirmPassword">Xác nhận mật khẩu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingRole" name="role" required>
                                <option value="Khách hàng" selected>Khách hàng</option>
                                <option value="Quản trị viên">Quản trị viên</option>
                            </select>
                            <label for="floatingRole">Vai trò</label>
                        </div>
                        <!-- Nút đăng ký -->
                        <button type="submit" class="btn btn-success w-50 mx-auto d-block mb-3">Đăng ký</button>
                    </form>
                    <div class="text-center">
                        Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a>
                    </div>
                    <!-- Nếu có thông báo lỗi -->
                    <?php if (isset($error_message)) { ?>
                        <div class="alert alert-danger mt-3">
                            <?php echo $error_message; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>