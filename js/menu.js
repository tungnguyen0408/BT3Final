document.addEventListener("DOMContentLoaded", function () {
  // Khi nhấn vào nút "Sửa"
  document.querySelectorAll(".edit-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const productId = button.getAttribute("data-id");

      // Gửi yêu cầu lấy thông tin sản phẩm qua AJAX
      fetch(`get_product_details.php?id=${productId}`)
        .then((response) => response.json())
        .then((product) => {
          if (product && product.id) {
            document.getElementById("editProductId").value = product.id;
            document.getElementById("editProductName").value = product.name;
            document.getElementById("editProductPrice").value = product.price;
            document.getElementById("editProductDescription").value =
              product.description;
            document.getElementById("editProductCategory").value =
              product.category_id;

            new bootstrap.Modal(document.getElementById("editModal")).show();
          } else {
            alert("Không thể tải thông tin sản phẩm");
          }
        })
        .catch((err) => alert("Lỗi: " + err));
    });
  });

  // Xử lý form sửa sản phẩm
  const form = document.getElementById("editProductForm");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(form);
      fetch("update_product.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("Cập nhật sản phẩm thành công!");
            location.reload(); // Tải lại trang sau khi cập nhật
          } else {
            alert("Lỗi cập nhật sản phẩm");
          }
        })
        .catch((err) => alert("Lỗi khi gửi dữ liệu"));
    });
  }
});
document.addEventListener("DOMContentLoaded", function () {
  // Khi nhấn vào nút "Sửa"
  document.querySelectorAll(".edit-btn").forEach((button) => {
    button.addEventListener("click", function () {
      const productId = button.getAttribute("data-id");

      // Gửi yêu cầu lấy thông tin sản phẩm qua AJAX
      fetch(`get_product_details.php?id=${productId}`)
        .then((response) => response.json())
        .then((product) => {
          if (product && product.id) {
            document.getElementById("editProductId").value = product.id;
            document.getElementById("editProductName").value = product.name;
            document.getElementById("editProductPrice").value = product.price;
            document.getElementById("editProductDescription").value =
              product.description;
            document.getElementById("editProductCategory").value =
              product.category_id;

            new bootstrap.Modal(document.getElementById("editModal")).show();
          } else {
            alert("Không thể tải thông tin sản phẩm");
          }
        })
        .catch((err) => alert("Lỗi: " + err));
    });
  });

  // Xử lý form sửa sản phẩm
  const form = document.getElementById("editProductForm");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      const formData = new FormData(form);
      fetch("update_product.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("Cập nhật sản phẩm thành công!");
            location.reload(); // Tải lại trang sau khi cập nhật
          } else {
            alert("Lỗi cập nhật sản phẩm");
          }
        })
        .catch((err) => alert("Lỗi khi gửi dữ liệu"));
    });
  }
});
