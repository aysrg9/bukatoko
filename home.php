<?php

// Session Start
session_start();

// Connect
require 'functions.php';

// query data product
$product = query("SELECT * FROM product");

// cek user login
if (isset($_SESSION['acces-login'])) {
    // jika sudah login ambil data dari session
    $id_user = $_SESSION['id_user'];
    $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
}

// waktu 
date_default_timezone_set('Asia/Jakarta');
$time = date("Y-m-d H:i:s");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukatoko</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Fix Confirm Form Resubmission -->
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>

<body>
    <!-- Start Navbar -->
    <section id="navbar" class="fixed-top">

        <div style="background-color: #F3F4F5;">

            <div id="text-info" class="container pt-1 pb-1">
                <!-- <a href="" class="me-3">About Bukatoko</a> -->
                <a class="me-1">Follow us on</a>
                <a class="me-2" href="https://github.com/aysrg9/" target="_blank"><i class="bi bi-github"></i></a>
                <a class="me-2" href="https://instagram.com/egydityaa/" target="_blank"><i
                        class="bi bi-instagram"></i></a>
                <a class="me-2" href="https://twitter.com/aysrg9/" target="_blank"><i class="bi bi-twitter"></i></a>
            </div>

        </div>

        <nav class="navbar shadow" style="background-color: #fff;">

            <div class="container">

                <a class="navbar-brand fs-2 text-primary fw-bold" href="home"
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>

                <form method="GET" action="./buyer/search" class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"
                            name="search"></i></button>
                </form>

                <?php if (isset($_SESSION['acces-login'])) : ?>

                <div id="button-navbar">

                    <div class="dropdown">
                        <a role="button" style="text-decoration: none;" class=" fw-bold fs-5" data-bs-toggle="dropdown"
                            aria-expanded="false">Hello,
                            <?= $_SESSION['username']; ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bold" href="./buyer/profile">Profile</a></li>
                            <li><a class="dropdown-item fw-bold" href="./buyer/cart">Cart</a></li>
                            <li><a class="dropdown-item fw-bold" href="./buyer/wishlist">Wishlist</a></li>
                            <li><a class="dropdown-item fw-bold" href="./buyer/order-list">Order List</a></li>
                            <li><a class="dropdown-item fw-bold" href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Logout</a></li>
                        </ul>
                    </div>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="background-color: gainsboro;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure logout?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary"><a href="./buyer/logout"
                                        class="text-light text-decoration-none">Logout</a></button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php else : ?>
                <div id="button-navbar">
                    <a href="./buyer/login" class="btn btn-primary fw-bold">LOGIN</a>
                    <a href="./buyer/register" class="btn btn-primary fw-bold">REGISTER</a>
                </div>
                <?php endif; ?>

            </div>

        </nav>

    </section>

    <!-- Navbar Bottom -->
    <section id="nav-bottom">

        <nav class="nav-icon navbar fixed-bottom">

            <div class="container">
                <a href="home"><i class="bi bi-house"></i></a>
                <a href="./buyer/wishlist"><i class="bi bi-heart"></i></a>
                <a href="./buyer/cart"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['acces-login'])) : ?>

                <a href="./buyer/profile"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="./buyer/login"><i class="bi bi-box-arrow-in-right"></i></a>
                <?php endif; ?>
            </div>

        </nav>

    </section>
    <!-- End Navbar Bottom -->
    <!-- End Navbar -->

    <!-- Carousel -->
    <section id="carousel">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="./assets/images/carousel/bukagames.png" class="d-block rounded" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./assets/images/carousel/bukareksa.png" class="d-block w-100 rounded" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./assets/images/carousel/murahmantap.png" class="d-block w-100 rounded" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End Carousel -->

    <!-- Info -->
    <?php if (isset($_SESSION['acces-login'])) : ?>
    <section id="info-customer" class="container">
        <div class="shadow card" style="background-color: #ffffff;">
            <div class="pt-3 pb-4 ps-3 pe-3">
                <h3 class="text-primary fw-bold">For <?= $fullname ?></h3>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Cashback 50%</h5>
                        <p class="card-text text-promo">Check Bukatoko Birthday Surprise for your first purchase.</p>
                    </div>
                </div>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Free Shipping</h5>
                        <p class="card-text text-promo">Free shipping for the island of Java. Checkout now!.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
    <section id="info-customer" class="container">
        <div class="shadow card" style="background-color: #ffffff;">
            <div class="pt-3 pb-4 ps-3 pe-3">
                <h3 class="text-primary fw-bold">For you</h3>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Cashback 50%</h5>
                        <p class="card-text text-promo">Check Bukatoko Birthday Surprise for your first purchase.</p>
                    </div>
                </div>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Free Shipping</h5>
                        <p class="card-text text-promo">Free shipping for the island of Java. Checkout now!.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- End Info -->

    <!-- Product -->
    <section id="product" class="container">

        <div id="banner-recomend" class="shadow card" style="background-color: #ffffff;">
            <h3 class="pt-2 pb-2 text-center text-primary fw-bold mb-0">Recommendation Product</h3>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-2 g-sm-3 mt-3">

            <?php $i = 1; ?>
            <?php foreach ($product as $row) : ?>

            <a href="./buyer/view?p=<?= $row["id_product"] ?>" style="text-decoration: none;">

                <div id="col-product" class="col card">

                    <div class="p-3 shadow bg-white ps-2 pe-2 pb-0">

                        <img src="./assets/images/product/<?= $row["picture"] ?>" class="card-img-top picture-product"
                            alt="...">

                        <div class="card-body pt-3">
                            <p class="card-title text-truncate text-dark"><?= $row["product_name"] ?></p>
                            <p class="card-title pt-2 mb-0 fw-bold text-truncate text-dark">
                                <?= rupiah($row["price"]) ?></p>
                        </div>

                    </div>

                </div>

            </a>

            <?php $i++ ?>
            <?php endforeach; ?>

        </div>
    </section>
    <!-- End Product -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>