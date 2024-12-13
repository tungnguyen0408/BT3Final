<?php
include('config.php');

$response = ["success" => false, "message" => "Có lỗi xảy ra."];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image_url = "";

    if (!empty($_FILES['product_image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        } else {
            $response["message"] = "Lỗi tải lên hình ảnh.";
            echo json_encode($response);
            exit();
        }
    }

    $sql = "INSERT INTO products (name, price, description, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sdss", $name, $price, $description, $image_url);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Thêm sản phẩm thành công.";
        } else {
            $response["message"] = "Lỗi: " . $stmt->error;
        }
    } else {
        $response["message"] = "Lỗi chuẩn bị truy vấn.";
    }
}

echo json_encode($response);
