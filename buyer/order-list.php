<?php

// start session
session_start();

// Connect
require '../functions.php';

// cek user login
if (isset($_SESSION['acces-login'])) {
    // jika sudah
    $id_user = $_SESSION['id_user'];
    $username = $_SESSION['username'];
} else {
    header('Location: home');
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
                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Warning!</h1>
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

    <!-- Order List -->
    <!-- Dekstop View -->
    <section id="dekstop-view" class="container" style="margin-bottom: -160px;">
        <h3>Order List</h3>

        <div class="alert alert-warning card shadow fw-bold" role="alert">
            If you have problems, don't hesitate to contact the admin. Thank you!
        </div>

        <?php

        $order_list = mysqli_query($db, "SELECT * FROM buy WHERE id_user = $id_user");
        $i = mysqli_num_rows($order_list);

        ?>

        <?php if ($i > 0) : ?>
        <?php while ($order_user = mysqli_fetch_array($order_list)) : ?>

        <div class="card shadow mb-3">
            <div class="ps-3 pe-3 pt-3">

                <div class="row">
                    <div class="col pe-0 me-0" style="max-width: 105px;">
                        <p class="fw-bold"><i class="bi bi-bag-fill"></i> Shopping</p>
                    </div>
                    <div class="col pe-0 me-0" style="max-width: 105px;">
                        <?= $order_user['created']; ?>
                    </div>
                    <div class="col" style="max-width: 75px;">
                        <span class="bg-success bg-opacity-25 pt-1 pb-1 pe-1 ps-1 rounded">
                            <span class="text-success fw-bold"><?= $order_user['status']; ?></span>
                        </span>
                    </div>
                    <div class="col pe-0 me-0 ms-0 ps-0 text-muted">
                        <?= $order_user['id_order']; ?>
                    </div>
                </div>

                <div class="pt-0 mt-0">
                    <p class="fw-bold"><i class="bi bi-patch-check-fill text-primary"></i> Bukatoko</p>
                </div>

                <div class="row mb-3" style="max-width: auto;">
                    <div class="col" style="max-width: 75px;">
                        <img src="../assets/images/product/<?= $order_user['picture']; ?>" alt="" width="60"
                            height="60">
                    </div>
                    <div class="col">
                        <p class="fw-bold mb-0 pb-0"><?= $order_user['product_name']; ?></p>
                        <p class="text-muted mt-0 pt-0"><?= $order_user['quantity']; ?> Item x
                            <?= rupiah($order_user['price']); ?></p>
                    </div>
                    <div class="col col-lg-2">
                        <p class="text-muted mb-0 p-0">Total Price</p>
                        <p class="fw-bold"><?= rupiah($order_user['total_price']); ?></p>
                    </div>
                </div>

            </div>
        </div>

        <?php endwhile; ?>
        <?php else : ?>
        <div class="card shadow mt-3" style="background-color: #ffffff;">
            <h3 class="text-primary text-center fw-bold mb-0 pt-1 pb-1">No Items</h3>
        </div>
        <?php endif; ?>

    </section>
    <!-- End Dekstiop View -->

    <!-- Mobile View -->
    <section style="margin-bottom: 84px;">
        <section id="mobile-view" class="container">

            <div class="alert alert-warning card shadow fw-bold" role="alert" style="margin-top: 84px;">
                If you have problems, don't hesitate to contact the admin. Thank you!
            </div>

            <?php

            $order_list = mysqli_query($db, "SELECT * FROM buy WHERE id_user = $id_user");
            $i = mysqli_num_rows($order_list);

            ?>

            <?php if ($i > 0) : ?>
            <?php while ($order_user = mysqli_fetch_array($order_list)) : ?>

            <div class="card shadow mb-3">
                <div class="ps-3 pe-3 pt-3">

                    <div class="row">

                        <div class="col pe-0 me-0 mb-0">
                            <p class="fw-bold mb-0 pb-0"><i class="bi bi-bag-fill"></i> Shopping</p>
                            <span><?= $order_user['created']; ?></span>
                        </div>

                        <div class="col pe-0 me-0 ms-0 ps-0 text-muted">
                            <?= $order_user['id_order']; ?>
                        </div>

                    </div>

                    <hr>

                    <div class="pt-0 mt-0">
                        <p class="fw-bold"><i class="bi bi-patch-check-fill text-primary"></i> Bukatoko</p>
                    </div>

                    <div class="row mb-3" style="max-width: auto;">
                        <div class="col" style="max-width: 75px;">
                            <img src="../assets/images/product/<?= $order_user['picture']; ?>" alt="" width="60"
                                height="60">
                        </div>
                        <div class="col">
                            <p class="fw-bold mb-0 pb-0"><?= $order_user['product_name']; ?></p>
                            <p class="text-muted mt-0 pt-0"><?= $order_user['quantity']; ?> Item x
                                <?= rupiah($order_user['price']); ?></p>
                        </div>

                    </div>

                    <hr>

                    <div>

                        <div class="float-start">
                            <p class="text-muted mb-0 p-0">Total Price</p>
                            <p class="fw-bold"><?= rupiah($order_user['total_price']); ?></p>
                        </div>

                        <div class="float-end">
                            <span class="bg-success bg-opacity-25 pb-1 pe-1 ps-1 rounded">
                                <span class="text-success fw-bold"><?= $order_user['status']; ?></span>
                            </span>
                        </div>

                    </div>

                </div>
            </div>

            <?php endwhile; ?>
            <?php else : ?>
            <div class="card shadow mt-3" style="background-color: #ffffff;">
                <h3 class="text-primary text-center fw-bold mb-0 pt-1 pb-1">No Items</h3>
            </div>
            <?php endif; ?>

        </section>
    </section>
    <!-- End Mobile View -->
    <!-- End Order List -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>