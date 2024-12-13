<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        echo json_encode([
            'status' => 'success',
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email']
        ]);
    } else {
        require_once 'config.php';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT username, email FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Lưu thông tin vào session để dùng cho các yêu cầu tiếp theo
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            echo json_encode([
                'status' => 'success',
                'username' => $user['username'],
                'email' => $user['email']
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy người dùng']);
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Chưa đăng nhập']);
}
