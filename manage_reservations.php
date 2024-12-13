<?php
include("config.php");
header('Content-Type: application/json');

// Xử lý cập nhật trạng thái đặt bàn
if (isset($_POST['action']) && $_POST['action'] == 'update_status') {
    $reservation_id = $_POST['reservation_id'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $reservation_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi: ' . $stmt->error]);
    }

    $stmt->close();
}

// Xử lý xóa đặt bàn
if (isset($_POST['action']) && $_POST['action'] == 'delete_reservation') {
    $reservation_id = $_POST['reservation_id'];
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
    $stmt->bind_param("i", $reservation_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Đặt bàn đã được xóa!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi: ' . $stmt->error]);
    }

    $stmt->close();
}

// Xử lý lấy danh sách đặt bàn với phân trang
if (isset($_POST['action']) && $_POST['action'] == 'load_reservations') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $itemsPerPage = 10;
    $offset = ($page - 1) * $itemsPerPage;
    // Lấy danh sách đặt bàn theo trang
    $sql = "SELECT r.id, t.name AS table_name, u.username, r.reservation_date, r.status 
            FROM reservations r 
            JOIN tables t ON r.table_id = t.id 
            JOIN users u ON r.user_id = u.id
            LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $itemsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $reservations = [];
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }

        // Lấy tổng số đặt bàn để tính số trang
        $countSql = "SELECT COUNT(*) AS total FROM reservations";
        $countResult = $conn->query($countSql);
        $totalItems = $countResult->fetch_assoc()['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        echo json_encode([
            'status' => 'success',
            'data' => $reservations,
            'total_pages' => $totalPages
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Không có dữ liệu']);
    }

    $stmt->close();
}

$conn->close();
