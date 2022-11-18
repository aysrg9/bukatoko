<?php

session_start();

// Connect
require '../functions.php';

// cek user login
if (isset($_SESSION['login'])) {
    // jika sudah
    $id_user = $_SESSION['id_user'];
} else {
    // jika belum
    header('Location: login.php');
}

// remove cart
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($db, "DELETE FROM cart WHERE id_cart = '$remove_id'");
    header('location:cart.php');
}

//query data product berdasarkan id_user
$cart = query("SELECT * FROM cart WHERE id_user = $id_user");

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
</head>

<body>
    <!-- Start Navbar -->
    <section id="navbar" class="fixed-top">
        <div style="background-color: #F3F4F5;">
            <div id="text-info" class="container pt-1 pb-1">
                <a href="" class="me-3">About Bukatoko</a>
                <a class="me-1">Follow us on</a>
                <a class="me-2" href="https://github.com/aysrg9/" target="_blank"><i class="bi bi-github"></i></a>
                <a class="me-2" href="https://instagram.com/egydityaa/" target="_blank"><i
                        class="bi bi-instagram"></i></a>
                <a class="me-2" href="https://twitter.com/aysrg9/" target="_blank"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
        <nav class="navbar shadow" style="background-color: #fff;">
            <div class="container">
                <a class="navbar-brand fs-2 text-primary fw-bold" href="../index.php"
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form method="GET" action="./buyer/search.php" class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"
                            name="search"></i></button>
                </form>


                <?php if (isset($_SESSION['login'])) : ?>

                <div id="button-navbar">
                    <a href="./buyer/logout.php" style="text-decoration: none;" class=" fw-bold fs-5">Halo,
                        <?= $_SESSION['username']; ?></a>
                </div>

                <?php else : ?>
                <div id="button-navbar">
                    <a href="./buyer/login.php" class="btn btn-primary fw-bold">LOGIN</a>
                    <a href="./buyer/register.php" class="btn btn-primary fw-bold">REGISTER</a>
                </div>

                <?php endif; ?>
            </div>
        </nav>
    </section>

    <!-- Navbar Bottom -->
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a href="index.php"><i class="bi bi-house"></i></a>
                <a href="#"><i class="bi bi-heart"></i></a>
                <a href="#"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['login'])) : ?>

                <a href="./buyer/logout.php"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="./buyer/login.php"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>
            </div>
        </nav>
    </section>
    <!-- End Navbar Bottom -->
    <!-- End Navbar -->

    <!-- Cart -->
    <section class="container">

        <div class="card shadow" style="background-color: #ffffff; margin-top: 156px;">
            <div class="pt-2 pb-2 ps-3 pe-3">
                <h3 class="text-primary fw-bold">Cart</h3>
            </div>
        </div>

        <div class="card shadow mt-3">
            <div class="row g-0 ps-2 pe-2 pb-2 pt-2">
                <div class="col text-center" style="max-width: auto;">Product</div>
                <div class="col text-center" style="max-width: 170px;">Unit Price</div>
                <div class="col text-center" style="max-width: 250px;">Quantity</div>
                <div class="col text-center" style="max-width: 100px;">Action</div>
            </div>
        </div>

        <?php $i = 1; ?>
        <?php foreach ($cart as $row) : ?>

        <div class="card shadow mt-3">
            <h5 class="pt-4 ps-2 ">Bukatoko <i class="bi bi-patch-check-fill text-primary"></i></h5>
            <hr>
            <div class="row g-0 ps-2 pe-2 pb-3">
                <div class="col" style="max-width: 594px;">
                    <img src="../assets/images/product/62bb3f4a6be9a.png" alt="" width="75px" height="75px">
                    <p class="d-inline-block tex    t-truncate" style="max-width: 495px;"><?= $row['product_name']; ?>
                    </p>
                </div>
                <div class="col text-center" style="max-width: 170px;"><?= rupiah($row["price"]) ?>
                </div>
                <div class="col text-center" style="max-width: 250px;"><?= $row['quantity']; ?></div>
                <div class="col text-center fs-4" style="max-width: 100px;"><a
                        href="cart.php?remove=<?= $row['id_cart']; ?>"><i class="bi bi-trash-fill"></i></a>
                </div>
            </div>
        </div>

        <?php $i++ ?>
        <?php endforeach; ?>

    </section>
    <!-- End Cart -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>