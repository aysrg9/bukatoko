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
    header('Location: login');
}

// remove cart
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($db, "DELETE FROM cart WHERE id_cart = '$remove_id'");
    header('location:cart');
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
                <form method="GET" action="search" class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"
                            name="search"></i></button>
                </form>


                <?php if (isset($_SESSION['login'])) : ?>

                <div id="button-navbar">
                    <div class="dropdown">
                        <a role="button" style="text-decoration: none;" class=" fw-bold fs-5" data-bs-toggle="dropdown"
                            aria-expanded="false">Hello,
                            <?= $_SESSION['username']; ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fw-bold" href="profile">Profile</a></li>
                            <li><a class="dropdown-item fw-bold" href="cart">Cart</a></li>
                            <li><a class="dropdown-item fw-bold" href="logout">Logout</a></li>
                        </ul>
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
                <a href="#"><i class="bi bi-heart"></i></a>
                <a href="cart"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['login'])) : ?>

                <a href="profile"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="login"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>
            </div>
        </nav>
    </section>
    <!-- End Navbar Bottom -->
    <!-- End Navbar -->

    <!-- Cart -->
    <!-- Dekstop View -->
    <section class="container" id="dekstop-view">
        <div class="card shadow" style="background-color: #ffffff;">
            <div class="pt-2 pb-2 ps-3 pe-3">
                <h3 class="text-primary fw-bold">Cart</h3>
            </div>
        </div>

        <div class="card shadow mt-3">
            <div class="row g-0 ps-2 pe-2 pb-2 pt-2">
                <div class="col text-center fw-bold" style="max-width: auto;">Product</div>
                <div class="col text-center fw-bold" style="max-width: 170px;">Unit Price</div>
                <div class="col text-center fw-bold" style="max-width: 250px;">Quantity</div>
                <div class="col text-center fw-bold" style="max-width: 100px;">Action</div>
            </div>
        </div>

        <?php

        $cart = mysqli_query($db, "SELECT * FROM cart WHERE id_user = $id_user");
        $i = mysqli_num_rows($cart);

        ?>

        <?php if ($i > 0) : ?>
        <?php while ($cart_user = mysqli_fetch_array($cart)) : ?>

        <div class="card shadow mt-3">
            <h5 class="pt-4 ps-2 ">Bukatoko <i class="bi bi-patch-check-fill text-primary"></i></h5>
            <hr>
            <div class="row g-0 ps-2 pe-2 pb-3">
                <div class="col" style="max-width: 594px;">
                    <img src="../assets/images/product/<?= $cart_user['picture']; ?>" alt="" width="75px" height="75px">
                    <p class="d-inline-block text-truncate" style="max-width: 495px;">
                        <?= $cart_user['product_name']; ?>
                    </p>
                </div>
                <div class="col text-center" style="max-width: 170px;"><?= rupiah($cart_user["price"]) ?>
                </div>
                <div class="col text-center" style="max-width: 250px;">
                    <?= $cart_user['quantity']; ?>
                </div>
                <div class="col text-center fs-3" style="max-width: 100px;">
                    <a href="cart?remove=<?= $cart_user['id_cart']; ?>"><i class="bi bi-trash-fill"></i></a>
                    <a href=""><i class="bi bi-credit-card"></i></a>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php else : ?>
        <div class="card shadow mt-3" style="background-color: #ffffff;">
            <h3 class="text-primary text-center fw-bold">No Items Added!</h3>
        </div>
        <?php endif; ?>

    </section>
    <!-- End Dekstop View -->

    <!-- Mobile View -->
    <section id="cart-mobile">
        <section class="container" id="mobile-view">

            <div class="card shadow text-cart-mobile-view" style="background-color: #ffffff;">
                <div class="pt-2 pb-2 ps-3 pe-3">
                    <h3 class="text-primary fw-bold">Cart</h3>
                </div>
            </div>

            <?php

            $cart = mysqli_query($db, "SELECT * FROM cart WHERE id_user = $id_user");
            $i = mysqli_num_rows($cart);

            ?>

            <?php if ($i > 0) : ?>
            <?php while ($cart_user = mysqli_fetch_array($cart)) : ?>

            <div class="card shadow mt-3 ">
                <h5 class="ps-2 pt-3 pb-2">Bukatoko <i class="bi bi-patch-check-fill text-primary"></i>
                </h5>
                <hr class="mb-0 mt-0">
                <div class="row g-0 ps-2 pb-2 pt-2">
                    <div class="col" style="max-width: 72px;">
                        <img src="../assets/images/product/<?= $cart_user['picture']; ?>" alt="" width="65px"
                            height="65px">
                    </div>
                    <div class="col" style="max-width: 275px;">
                        <p class="text-truncate mb-0 pb-0"><?= $cart_user['product_name']; ?></p>
                        <p class="fw-bold mb-0 pb-0"><?= rupiah($cart_user["price"]) ?></p>
                        <p class="mb-0 pb-0">Quantity <?= $cart_user["quantity"] ?></p>
                    </div>
                </div>
                <div class="pe-2 pb-2 fs-2">
                    <a class="float-end ps-2" href="cart?remove=<?= $cart_user['id_cart']; ?>"><i
                            class="bi bi-trash-fill"></i></a>
                    <a class="float-end" href=""><i class="bi bi-credit-card"></i></a>
                </div>
            </div>

            <?php endwhile; ?>
            <?php else : ?>
            <div class="card shadow mt-3" style="background-color: #ffffff;">
                <h3 class="text-primary text-center fw-bold pt-2">No Items Added!</h3>
            </div>
            <?php endif; ?>

        </section>
    </section>
    <!-- End Mobile View -->
    <!-- End Cart -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>