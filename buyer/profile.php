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
                    <form action="" method="post">
                        <div class="dropdown">
                            <a role="button" style="text-decoration: none;" class=" fw-bold fs-5"
                                data-bs-toggle="dropdown" aria-expanded="false">Hello,
                                <?= $_SESSION['username']; ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fw-bold" href="profile">Profile</a></li>
                                <li><a class="dropdown-item fw-bold" href="cart">Cart</a></li>
                                <li><a class="dropdown-item fw-bold" href="logout">Logout</a></li>
                            </ul>
                        </div>
                    </form>
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

                <a href="logout"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="login"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>
            </div>
        </nav>
    </section>
    <!-- End Navbar Bottom -->
    <!-- End Navbar -->

    <!-- Profile -->
    <section id="dekstop-view" class="container">
        <div class="card shadow">
            <div class="head ps-3 pt-3 pe-3">
                <h3 class="mb-0 mt- 0">My Profile</h3>
                <p class="mb-0 mt-0">Manage your profile information to control, protect and secure your account</p>
                <hr>
            </div>
            <div class="profile-buyer ps-3 pt-3 pe-3 pb-4">
                <div class="row">
                    <div class="col" style="max-width: 225px;">
                        <img class="border mb-3" src="../assets/images/profile/person.png" alt="" width="225px"
                            height="225px">

                        <label for="select-picture" class="form-label btn btn-primary btn-sm"
                            style="width: 225px;">SELECT
                            IMAGE</label>
                        <input class="form-control d-none" type="file" id="select-picture">
                        <p class="mb-0">File size: 2,000,000 bytes (2 Megabytes) maximum. Allowed file extensions: .PNG
                            only
                        </p>
                    </div>
                    <div class="col ms-5" style="max-width: 821px;">
                        <h5>Change Personal Data</h5>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control-plaintext" id="username" value="aysrg9">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                            <div class="col">
                                <input type="text" class="form-control" id="fullname" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col">
                                <input type="email" class="form-control" id="email" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="created" class="col-sm-2 col-form-label">Created At</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="created"
                                    value="2022-11-16 16:53:33">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm float-end ps-3 pe-3 pb-1 pt-1">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>