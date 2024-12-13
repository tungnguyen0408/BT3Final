<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Bạn chưa đăng nhập']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    require_once 'config.php';

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $userId = $_SESSION['user_id'];
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($oldPassword, $user['password'])) {
            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET password = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("si", $newPasswordHashed, $userId);
            $updateStmt->execute();

            if ($updateStmt->affected_rows > 0) {
                echo json_encode(['status' => 'success', 'message' => 'Mật khẩu đã được cập nhật']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không thể cập nhật mật khẩu']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu cũ không đúng']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy người dùng']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
