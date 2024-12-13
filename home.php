<?php
include('config.php');
// Lấy số bàn được đặt trong hôm nay
$sql_today = "SELECT COUNT(*) AS today_reservations FROM reservations WHERE DATE(reservation_date) = CURDATE()";
$result_today = $conn->query($sql_today);
$row_today = $result_today->fetch_assoc();
$today_reservations = $row_today['today_reservations'];

// Lấy số bàn được đặt trong tuần này
$sql_week = "SELECT COUNT(*) AS week_reservations FROM reservations WHERE YEARWEEK(reservation_date, 1) = YEARWEEK(CURDATE(), 1)";
$result_week = $conn->query($sql_week);
$row_week = $result_week->fetch_assoc();
$week_reservations = $row_week['week_reservations'];

// Lấy số bàn được đặt trong tháng này
$sql_month = "SELECT COUNT(*) AS month_reservations FROM reservations WHERE MONTH(reservation_date) = MONTH(CURDATE()) AND YEAR(reservation_date) = YEAR(CURDATE())";
$result_month = $conn->query($sql_month);
$row_month = $result_month->fetch_assoc();
$month_reservations = $row_month['month_reservations'];

// Lấy số phản hồi của khách hàng trong tháng này
$sql_feedback = "SELECT COUNT(*) AS monthly_feedback FROM feedbacks WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())";
$result_feedback = $conn->query($sql_feedback);
$row_feedback = $result_feedback->fetch_assoc();
$monthly_feedback = $row_feedback['monthly_feedback'];

$week_days = ['Ngày Chủ Nhật', 'Ngày Thứ Hai', 'Ngày Thứ Ba', 'Ngày Thứ Tư', 'Ngày Thứ Năm', 'Ngày Thứ Sáu', 'Ngày Thứ Bảy'];

// Dữ liệu số bàn đặt trong tuần
$day_reservations = [];
for ($day_number = 1; $day_number <= 7; $day_number++) {
    $sql_reservations = "SELECT COUNT(*) AS reservations_count FROM reservations WHERE DAYOFWEEK(reservation_date) = ?";
    $stmt = $conn->prepare($sql_reservations);
    $stmt->bind_param("i", $day_number); // DAYOFWEEK: 1 = Chủ nhật, 2 = Thứ hai, ..., 7 = Thứ bảy
    $stmt->execute();
    $result_reservations = $stmt->get_result();
    $row_reservations = $result_reservations->fetch_assoc();
    $day_reservations[] = $row_reservations['reservations_count'];
}

// Dữ liệu số phản hồi trong tuần
$day_feedbacks = [];
for ($day_number = 1; $day_number <= 7; $day_number++) {
    $sql_feedbacks = "SELECT COUNT(*) AS feedback_count FROM feedbacks WHERE DAYOFWEEK(created_at) = ?";
    $stmt = $conn->prepare($sql_feedbacks);
    $stmt->bind_param("i", $day_number);
    $stmt->execute();
    $result_feedbacks = $stmt->get_result();
    $row_feedbacks = $result_feedbacks->fetch_assoc();
    $day_feedbacks[] = $row_feedbacks['feedback_count'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Quán Cà Phê</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/home.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 sidebar vh-100 text-white">
                <h4 class="text-center py-3">ADMIN</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="./home.php" class="nav-link active">
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./product.php" class="nav-link">
                            Quản lý sản phẩm
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="./tableForm.php" class="nav-link">
                            Quản lý đặt bàn
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./responses.php" class="nav-link">
                            Phản hồi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./user.php" class="nav-link">
                            Tài khoản
                        </a>
                    </li>

                </ul>
                <div class="mt-4 px-3">
                    <button class="btn btn-danger w-100">Đăng xuất</button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-10 content">
                <div class="p-3">
                    <h3 class="mb-4">Quán Cà Phê</h3>
                    <div class="bg-light p-4 rounded shadow-sm">
                        <h4>Chào mừng bạn đến với hệ thống quản lý!</h4>
                        <p>Đây là không gian dành riêng cho quản lý để theo dõi hoạt động kinh doanh của quán.</p>
                    </div>

                    <!-- Dashboard Statistics -->
                    <div class="row mt-4 text-center">
                        <div class="col-md-3 p-3 bg-light shadow-sm rounded">
                            <h5>Số bàn được đặt hôm nay</h5>
                            <p class="fw-bold text-success"><?php echo $today_reservations; ?></p>
                        </div>
                        <div class="col-md-3 p-3 bg-light shadow-sm rounded">
                            <h5>Số bàn được đặt trong tuần</h5>
                            <p class="fw-bold"><?php echo $week_reservations; ?></p>
                        </div>
                        <div class="col-md-3 p-3 bg-light shadow-sm rounded">
                            <h5>Số bàn được đặt trong tháng</h5>
                            <p class="fw-bold"><?php echo $month_reservations; ?></p>
                        </div>
                        <div class="col-md-3 p-3 bg-light shadow-sm rounded text-center">
                            <h5>Số phản hồi của khách hàng trong tháng</h5>
                            <p class="fw-bold"><?php echo $monthly_feedback; ?></p>
                        </div>
                    </div>

                    <!-- Biểu đồ -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="chart-container bg-light p-3 rounded shadow-sm">
                                <canvas id="reservationsChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-container bg-light p-3 rounded shadow-sm">
                                <canvas id="feedbackChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.querySelector('.btn-danger').addEventListener('click', function() {
            window.location.href = 'logout.php';
        });

        document.addEventListener('DOMContentLoaded', function() {
            var dayReservations = <?php echo json_encode($day_reservations); ?>;
            var dayFeedbacks = <?php echo json_encode($day_feedbacks); ?>;

            var ctxReservations = document.getElementById("reservationsChart").getContext("2d");
            var reservationsChart = new Chart(ctxReservations, {
                type: "bar",
                data: {
                    labels: ["Chủ nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu",
                        "Thứ Bảy"
                    ],
                    datasets: [{
                        label: "Số bàn đặt",
                        data: dayReservations,
                        backgroundColor: "#36A2EB",
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            // Vẽ biểu đồ số phản hồi trong tuần
            var ctxFeedbacks = document.getElementById("feedbackChart").getContext("2d");
            var feedbackChart = new Chart(ctxFeedbacks, {
                type: "bar",
                data: {
                    labels: ["Chủ nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu",
                        "Thứ Bảy"
                    ],
                    datasets: [{
                        label: "Số phản hồi",
                        data: dayFeedbacks,
                        backgroundColor: "#FF5733",
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>
</body>

</html>