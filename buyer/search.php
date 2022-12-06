<?php

// start session
session_start();

// Connect
require '../functions.php';

// query data product
$product = query("SELECT * FROM product");

// cek user login
if (isset($_SESSION['acces-login'])) {
    // jika sudah
    $id_user = $_SESSION['id_user'];
    $username = $_SESSION['username'];
}

// ambil keyword
$keyword = $_GET['keyword'];

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
    <link rel="stylesheet" href="../assets/css/style.css">

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
                <a class="navbar-brand fs-2 text-primary fw-bold" href="../home"
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form method="GET" action="" class="d-flex" role="search">
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
                            <li><a class="dropdown-item fw-bold" href="profile">Profile</a></li>
                            <li><a class="dropdown-item fw-bold" href="cart">Cart</a></li>
                            <li><a class="dropdown-item fw-bold" href="wishlist">Wishlist</a></li>
                            <li><a class="dropdown-item fw-bold" href="order-list">Order List</a></li>
                            <li><a class="dropdown-item fw-bold" href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Logout</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                <a href="logout" class="text-light text-decoration-none"><button
                                        class="btn btn-primary">Logout</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php else : ?>
                <div id="button-navbar">
                    <a href="login" class="btn btn-primary fw-bold">LOGIN</a>
                    <a href="register" class="btn btn-primary fw-bold">REGISTER</a>
                </div>

                <?php endif; ?>
            </div>
        </nav>
    </section>

    <!-- Navbar Bottom -->
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a href="../home"><i class="bi bi-house"></i></a>
                <a href="wishlist"><i class="bi bi-heart"></i></a>
                <a href="cart"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['acces-login'])) : ?>

                <a href="profile"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="login"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>
            </div>
        </nav>
    </section>
    <!-- End Navbar Bottom -->
    <!-- End Navbar -->

    <!-- Product -->
    <section id="product" class="container">

        <div id="banner-search" class="shadow card" style="background-color: #ffffff;">
            <h3 class="pt-2 pb-2 text-center text-primary fw-bold mb-0">Based on what you are looking for</h3>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-2 g-sm-3 mt-3">

            <?php

            $query = mysqli_query($db, "SELECT * FROM product WHERE product_name LIKE '%$keyword%'");
            $i = mysqli_num_rows($query);

            ?>

            <?php if ($i > 0) : ?>
            <?php while ($p = mysqli_fetch_array($query)) : ?>



            <a href="view?p=<?= $p["id_product"] ?>" style="text-decoration: none;">

                <div id="col-product" class="col shadow card">

                    <div class="p-3 shadow-sm bg-white ps-1 pe-1 pb-0">

                        <img src="../assets/images/product/<?= $p["picture"] ?>" class="card-img-top picture-product"
                            alt="...">

                        <div class="card-body pt-3">
                            <p class="card-title text-truncate text-dark"><?= $p["product_name"] ?></p>
                            <p class="card-title pt-2 fw-bold text-dark mb-0 text-truncate"><?= rupiah($p["price"]) ?>
                            </p>
                        </div>

                    </div>

                </div>

            </a>

            <?php endwhile; ?>
            <?php else : ?>
            <div class="alert alert-dismissible fade show text-center" role="alert" style="width: 100%;">
                <strong class="fs-1">The product you are looking for was not found!</strong>
            </div>
            <?php endif; ?>

        </div>

    </section>
    <!-- End Product -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>