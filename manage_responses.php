<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    if ($id > 0) {
        $sql = "DELETE FROM feedbacks WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Không thể xóa phản hồi.']);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Lỗi khi chuẩn bị câu lệnh SQL.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'ID phản hồi không hợp lệ.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Yêu cầu không hợp lệ.']);
}

$conn->close();
