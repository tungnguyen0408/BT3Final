<?php
include 'delete_product.php';
include 'config.php';

$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT id, name, price, image_url FROM products";

if ($search_term) {
    $query .= " WHERE name LIKE '%" . $conn->real_escape_string($search_term) . "%'";
}

$result = $conn->query($query);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h3>" . $product['name'] . "</h3>";
        echo "<img src='" . $product['image_url'] . "' alt='" . $product['name'] . "'>";
        echo "<p>Giá: " . $product['price'] . " VND</p>";
        echo "</div>";
    }
} else {
    echo "<p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</p>";
}
