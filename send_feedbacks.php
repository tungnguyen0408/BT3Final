<?php
session_start();

if (isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
    $userId = $_SESSION['user_id'];
} else {
    echo '<script>alert("Bạn cần đăng nhập để gửi phản hồi."); window.location.href="login.php";</script>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $replyContent = htmlspecialchars($_POST['replyContent']);
    $feedbackId = $_POST['feedback_id'];

    // Kết nối tới cơ sở dữ liệu
    $conn = new mysqli("localhost", "username", "password", "database_name");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Truy vấn để lấy email người nhận từ bảng feedbacks
    $sql = "SELECT recipient_id FROM feedbacks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $feedbackId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $feedback = $result->fetch_assoc();
        $recipientId = $feedback['recipient_id'];

        $sql2 = "SELECT email FROM users WHERE id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $recipientId);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            $userData = $result2->fetch_assoc();
            $recipientEmail = $userData['email'];

            // Cấu hình email
            $subject = 'Phản hồi từ người dùng';
            $message = "Nội dung phản hồi:\n\n" . $replyContent;
            $headers = "From: $userEmail\r\n";
            $headers .= "Reply-To: $userEmail\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Gửi email
            if (mail($recipientEmail, $subject, $message, $headers)) {
                echo '<script>alert("Phản hồi của bạn đã được gửi!"); window.location.href="index.php";</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra khi gửi phản hồi. Vui lòng thử lại!"); window.location.href="index.php";</script>';
            }
        } else {
            echo '<script>alert("Không tìm thấy người nhận."); window.location.href="index.php";</script>';
        }
    } else {
        echo '<script>alert("Không tìm thấy phản hồi với ID này."); window.location.href="index.php";</script>';
    }

    $conn->close();
}
