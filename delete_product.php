<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $productId = intval($_DELETE['delete_id']); // Lấy id sản phẩm từ URL

    if ($productId > 0) {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("i", $productId);
            if ($stmt->execute()) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "error" => "Không thể xóa sản phẩm."]);
            }
        } else {
            echo json_encode(["success" => false, "error" => "Lỗi SQL."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "ID sản phẩm không hợp lệ."]);
    }
}
