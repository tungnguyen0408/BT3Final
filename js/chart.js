var ctx1 = document.getElementById("revenueChart").getContext("2d");
var ctx2 = document.getElementById("topItemsChart").getContext("2d");

// Biểu đồ doanh thu (Cột)
var revenueChart = new Chart(ctx1, {
  type: "bar", // Thay đổi loại biểu đồ thành 'bar'
  data: {
    labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4"],
    datasets: [
      {
        label: "Doanh thu",
        data: [3000000, 2500000, 2000000, 3500000],
        backgroundColor: "rgba(54, 162, 235, 0.2)",
        borderColor: "rgba(54, 162, 235, 1)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true, // Đảm bảo trục Y bắt đầu từ 0
      },
    },
  },
});

// Biểu đồ món bán chạy (Cột)
var topItemsChart = new Chart(ctx2, {
  type: "bar", // Thay đổi loại biểu đồ thành 'bar'
  data: {
    labels: ["Cà phê", "Trà", "Sinh tố", "Cocktail"],
    datasets: [
      {
        label: "Món bán chạy",
        data: [50, 30, 10, 20],
        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"],
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true, // Đảm bảo trục Y bắt đầu từ 0
      },
    },
  },
});
