<?php
require_once 'config.php';
// Kiểm tra nếu form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: home.php");
                exit();
            } else {
                $error_message = "Email hoặc mật khẩu không đúng!";
            }
        } else {
            $error_message = "Email hoặc mật khẩu không đúng!";
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
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-100">
            <div class="col-12 col-lg-6 mx-auto">
                <div class="card shadow p-4">
                    <h2 class="login-text mb-4 text-center">Đăng nhập</h2>
                    <form action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="email" required />
                            <label for="floatingInput">Địa chỉ email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="password" required />
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>
                        <!-- Nút đăng nhập điều chỉnh lại kích thước -->
                        <button type="submit" class="btn btn-success w-50 mx-auto d-block mb-3">Đăng nhập</button>
                    </form>
                    <div class="text-center">
                        Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a>
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