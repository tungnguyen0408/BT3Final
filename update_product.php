<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $old_image = $_POST['old_image'];

    if (!empty($_FILES['product_image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        } else {
            $response["message"] = "Lỗi tải lên hình ảnh.";
        }
    } else {
        $image_url = $old_image;
    }

    $sql = "UPDATE products SET name = ?, price = ?, description = ?, image_url = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sdssi", $name, $price, $description, $image_url, $id);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Cập nhật sản phẩm thành công.";
        } else {
            $response["message"] = "Lỗi: " . $stmt->error;
        }
    } else {
        $response["message"] = "Lỗi chuẩn bị truy vấn.";
    }
}

echo json_encode($response);
