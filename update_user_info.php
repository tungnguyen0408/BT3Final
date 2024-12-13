<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Chưa đăng nhập']);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $new_username = $_POST['username'] ?? null;
    $new_email = $_POST['email'] ?? null;

    if (!$new_username || !$new_email) {
        echo json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin']);
        exit();
    }

    require_once 'config.php';

    try {
        $sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $new_username, $new_email, $user_id);

        if ($stmt->execute()) {
            $_SESSION['username'] = $new_username;
            $_SESSION['email'] = $new_email;

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không thể cập nhật thông tin']);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi: ' . $e->getMessage()]);
    }

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Phương thức không hợp lệ']);
}
