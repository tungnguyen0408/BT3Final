<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halu Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/index.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar" style="height: 100px">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="Halu Cafe" width="40" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#introduce">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="/divider.html" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-warning">COFFEE</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="product.html">Espresso</a></li>
                                            <li><a href="product.html">Cappuccino</a></li>
                                            <li><a href="product.html">Vanilla Latte</a></li>
                                            <li><a href="product.html">Caramel Macchiato</a></li>
                                        </ul>
                                        <img src="images/huongvimoi.webp" alt="Coffee" class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-warning">COCKTAIL</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="product.html">Cocktail Bloody Mary</a></li>
                                            <li><a href="product.html">Cocktail Mojito</a></li>
                                            <li><a href="product.html">Cocktail B-52</a></li>
                                            <li><a href="product.html">Cocktail Bacardi</a></li>
                                        </ul>
                                        <img src="images/cocktail-thuc-uong-quen-thuoc-trong-doi-song.jpg"
                                            alt="Cocktail" class="img-fluid" />
                                    </div>
                                </div>
                                <li>
                                    <a class="text-white text-decoration-none" href="/divider.html">Xem tất cả sản
                                        phẩm</a>
                                </li>
                            </div>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sale">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/contact.html">Liên hệ</a>
                    </li>
                </ul>

                <!-- Phần đăng nhập -->
                <div class="d-flex align-items-center">
                    <a href="login.php" class="btn btn-warning">Đăng nhập</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="coffeeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#coffeeCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#coffeeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#coffeeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/img1.jpeg" class="d-block w-100" alt="Coffee Image 1" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Phong cách độc nhất</h5>
                    <p>COFFEE ĐẶC BIỆT PHA CHẾ</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/huongvimoi.webp" class="d-block w-100" alt="Coffee Image 2" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Chất lượng thượng hạng</h5>
                    <p>Thưởng thức ly cà phê đậm đà</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/img1.jpeg" class="d-block w-100" alt="Coffee Image 3" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Hương vị hoàn hảo</h5>
                    <p>Cà phê pha chế từ những hạt tốt nhất</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Trước đó</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#coffeeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Tiếp theo</span>
        </button>
    </div>
    <!-- Sale -->
    <section class="my-5" id="sale">
        <div class="container box-categories">
            <div class="row">
                <!-- Box ảnh đầu tiên -->
                <div class="col-sm-7 col-xs-12">
                    <div class="box-sale h-100">
                        <a class="item" href="#" title="Thứ 6 này 25 % ưu đãi">
                            <div class="box-item h-100">
                                <img src="images/img1.jpeg" alt="Thứ 6 này 25 % ưu đãi" />
                                <div class="text">
                                    <h3>Thứ 6 này 25 % ưu đãi</h3>
                                    <span class="btn-readmore">Tìm hiểu</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Box ảnh thứ hai -->
                <div class="col-sm-5 col-xs-12">
                    <div class="box-sale h-100">
                        <a class="item" href="#" title="Tuyệt vời món mới">
                            <div class="box-item h-100">
                                <img src="images/cocktail-thuc-uong-quen-thuoc-trong-doi-song.jpg"
                                    alt="Tuyệt vời món mới" />
                                <div class="text">
                                    <h3>Tuyệt vời món mới</h3>
                                    <span class="btn-readmore">Tìm hiểu</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <h2 class="my-4">Danh mục sản phẩm cà phê</h2>

        <div class="row ps-lg-3 pt-5" style="background-color: rgba(119, 90, 54, 0.785); border-radius: 10px">
            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product6.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê kem</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">65.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product4.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê Americano</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">100.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product3.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê Latte</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">55.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product1.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê Espresso</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">40.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product2.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê Cappuccino</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">50.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="/product.html"><img class="card-img-top h-100 object-fit-contain"
                                src="images/product5.webp" alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cà phê Mocha</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">45.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Divider -->
    <div class="divider"></div>

    <!-- Process-->
    <section class="coffee-process" id="introduce">
        <div class="container my-5">
            <div class="row centered-content">
                <!-- Text and Coffee Bean Section -->
                <div class="col-md-5 position-relative">
                    <div class="coffee-process-section">
                        <div class="coffee-process-text">
                            <h2>Quy trình làm COFFEE</h2>
                            <p>
                                Chúng tôi muốn bạn tự hào cho chính bản thân mình hương vị cà
                                phê theo ý thích. Đó là bản chất cơ bản nhất để có những tách
                                cà phê thơm ngon nhất.
                            </p>
                            <button>Khám phá quy trình</button>
                            <!-- Coffee Bean Image (80x80) -->
                            <img src="images/product2.webp" alt="Coffee Bean" class="coffee-bean-img" />
                        </div>
                    </div>
                </div>

                <!-- Carousel Section -->
                <div class="col-md-5">
                    <div id="coffeeProcessCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="coffee-carousel-item carousel-item active">
                                <img src="images/huongvimoi.webp" class="d-block w-100" alt="Coffee Process 1" />
                            </div>
                            <!-- Slide 2 -->
                            <div class="coffee-carousel-item carousel-item">
                                <img src="images/nuocep.jpg" class="d-block w-100" alt="Coffee Process 2" />
                            </div>
                            <!-- Slide 3 -->
                            <div class="coffee-carousel-item carousel-item">
                                <img src="images/image1.png" class="d-block w-100" alt="Coffee Process 3" />
                            </div>
                            <!-- Slide 4 -->
                            <div class="coffee-carousel-item carousel-item">
                                <img src="images/cocktail-thuc-uong-quen-thuoc-trong-doi-song.jpg" class="d-block w-100"
                                    alt="Coffee Process 4" />
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#coffeeProcessCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#coffeeProcessCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <div class="container">
        <h2 class="my-4">Cocktails</h2>

        <div class="row ps-lg-5 pt-5" style="background-color: rgba(119, 90, 54, 0.785); border-radius: 10px">
            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-cover" src="images/cocktails1.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cocktail kiểu cũ</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">120.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-cover" src="images/cocktails2.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cocktail Negroni</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">90.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-contain" src="images/cocktails11.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cocktail Daiquiri</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">80.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-contain" src="images/cocktails8.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cocktail Manhattan</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">100.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-contain" src="images/cocktails5.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">ocktail Vodka Martini</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">160.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 ps-lg-5" style="height: 120px">
                <div class="card-list h-100">
                    <div class="card-body float-start w-25 p-4 h-100">
                        <a href="#"><img class="card-img-top h-100 object-fit-contain" src="images/cocktails10.png"
                                alt="img" /></a>
                    </div>
                    <div class="detail-product float-start w-75 h-100 p-3">
                        <div class="card-body ps-2 w-75 float-start">
                            <h4 class="card-title">
                                <a href="#" class="text-decoration-none">Cocktail Penicillin</a>
                            </h4>
                        </div>
                        <div class="special-price w-25 float-end mt-1">
                            <span class="price product-price">120.000₫</span>
                        </div>
                        <div class="product-decription clearfix mt-5">
                            <p class="card-text">
                                Cà phê đậm phong cách Ý được phối hợp với kem giúp giữ hương
                                vị và tạo sự thơm ngon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <!-- ReserveTable-->
    <section class="reserveTable" id="reserve">
        <div class="container mt-4 getTable">
            <div class="row">
                <!-- Opening Hours -->
                <div class="col-md-4 mb-3">
                    <div class="opening-hours">
                        <h4>Giờ mở cửa</h4>
                        <p>Thứ 2 - Thứ 6 hàng tuần</p>
                        <p>7h sáng - 11h sáng</p>
                        <p>11h sáng - 10h tối</p>
                        <hr />
                        <p>Thứ 7, Chủ nhật hàng tuần</p>
                        <p>8h sáng - 1h chiều</p>
                        <p>1h chiều - 9h tối</p>
                        <h5>Số điện thoại</h5>
                        <p><strong>0902068068</strong></p>
                    </div>
                </div>

                <!-- Reservation Form -->
                <div class="col-md-8">
                    <div class="reservation-form">
                        <h4>Gọi ngay cho chúng tôi để đặt bàn</h4>
                        <form>
                            <!-- Name and Phone in the same row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Họ tên*</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn" />
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Điện thoại*</label>
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Nhập số điện thoại" />
                                </div>
                            </div>

                            <!-- Date and Time in the same row -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="date">Ngày*</label>
                                    <input type="text" class="form-control" id="date" placeholder="Chọn ngày" />
                                </div>
                                <div class="col-md-6">
                                    <label for="time">Giờ*</label>
                                    <input type="text" class="form-control" id="time" placeholder="Chọn giờ" />
                                </div>
                            </div>

                            <!-- Notes section -->
                            <div class="mt-3">
                                <label for="notes">Ghi chú</label>
                                <textarea id="notes" class="form-control" rows="4"
                                    placeholder="Bạn có ghi chú gì không?"></textarea>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-submit mt-4">
                                Đặt bàn ngay
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider"></div>
    <!-- why-->
    <div class="features-section text-center my-5">
        <h2 class="text-warning">Vì sao nên chọn HaluCafe</h2>
        <p>
            Không những mang đến sự tuyệt vời thông qua các thức uống bí mật mà hơn
            thế nữa là cảm giác bạn tận hưởng được chỉ khi đến với Halu Cafe.
        </p>
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3 feature-item">
                <img src="images/product4.webp" alt="Coffee Icon" class="img-fluid mb-3" style="width: 50px" />
                <h3 class="h5 text-dark">COFFEE NGUYÊN CHẤT</h3>
                <p class="text-muted">
                    Hạt cà phê được thu hoạch và rang xay theo quy trình...
                </p>
            </div>
            <div class="col-md-4 col-lg-3 feature-item">
                <img src="images/cocktails11.png" alt="Machine Icon" class="img-fluid mb-3" style="width: 50px" />
                <h3 class="h5 text-dark">PHA CHẾ ĐỘC ĐÁO</h3>
                <p class="text-muted">
                    Bí kíp tạo nên sự độc đáo là trong từng thức uống đó...
                </p>
            </div>
            <div class="col-md-4 col-lg-3 feature-item">
                <img src="images/product3.webp" alt="Dessert Icon" class="img-fluid mb-3" style="width: 50px" />
                <h3 class="h5 text-dark">DESSERT ĐẶC BIỆT</h3>
                <p class="text-muted">
                    Các món bánh tráng miệng và hoa quả tại Thanh Tùng Coffee...
                </p>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <section class="footer">
        <div class="container-fluid mt-5">
            <footer class="text-white text-center">
                <div class="container p-4">
                    <div class="row mt-4">
                        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                            <h5 class="text-uppercase mb-4">Cửa hàng cà phê Halu</h5>
                            <div class="d-flex justify-content-center align-items-center p-4">
                                <a href="#">
                                    <img class="img-fluid w-25" src="images/logo.png" alt="Logo" />
                                </a>
                            </div>
                            <div class="d-flex justify-content-center align-items-center m-1">
                                <a type="button" class="btn btn-floating btn-light btn-lg"><i
                                        class="fab fa-facebook-f"></i></a>

                                <a type="button" class="btn btn-floating btn-light btn-lg m-1"><i
                                        class="fab fa-dribbble"></i></a>

                                <a type="button" class="btn btn-floating btn-light btn-lg m-1"><i
                                        class="fab fa-twitter"></i></a>

                                <a type="button" class="btn btn-floating btn-light btn-lg m-1"><i
                                        class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase mb-4 pb-1">Thông tin về cửa hàng</h5>

                            <ul class="fa-ul" style="margin-left: 1.65em">
                                <li class="mb-3">
                                    <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Nguyễn
                                        Trãi, Phường Mộ Lao, Hà Đông, Hà Nội</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fa-li"><i class="fas fa-envelope"></i></span><span
                                        class="ms-2">tungnguyen0408tnnmm@gmmail.com</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+84 67 082
                                        538</span>
                                </li>
                            </ul>
                        </div>

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase mb-4">Opening hours</h5>

                            <table class="table text-center text-white">
                                <tbody class="fw-normal">
                                    <tr>
                                        <td>Thứ hai - Thứ năm:</td>
                                        <td>8am - 9pm</td>
                                    </tr>
                                    <tr>
                                        <td>Thứ sáu - Thứ bảy:</td>
                                        <td>8am - 7pm</td>
                                    </tr>
                                    <tr>
                                        <td>Chủ nhật:</td>
                                        <td>9am - 10pm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center p-3" style="background-color: rgba(148, 84, 84, 0.77)">
                    © 2020 Bản quyền:
                    <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">halucoffee.com</a>
                </div>
            </footer>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="logic.js"></script>
</body>

</html>