<?php

// Session Start
session_start();

// Connect
require '../functions.php';

// cek user login
if (isset($_SESSION['acces-login'])) {
    // jika sudah ambil id dari session
    $id_user = $_SESSION['id_user'];
} else {
    // jika belum
    header('Location: login');
}

//query data customer berdasarkan id
$customer = query("SELECT * FROM customer WHERE id_user = $id_user")[0];

// jika tombol save ditekan
if (isset($_POST['save'])) {

    // cek apakah user rubah data
    if (changeprofile($_POST) > 0) {
        // jika user rubah data
        // lakukan refresh halaman
        $message[] = "Changed Successfully!";
        $messagem[] = "Changed Successfully!";
        $sec = "3";
        header("Refresh: $sec;");
    } else {
        // jika tidak rubah data
        $errorm[] = "No Data Changes!";
        $error[] = "No Data Changes!";
    }
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
                    <form action="" method="post">
                        <div class="dropdown">
                            <a role="button" style="text-decoration: none;" class=" fw-bold fs-5"
                                data-bs-toggle="dropdown" aria-expanded="false">Hello,
                                <?= $_SESSION['username']; ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fw-bold" href="profile">Profile</a></li>
                                <li><a class="dropdown-item fw-bold" href="cart">Cart</a></li>
                                <li><a class="dropdown-item fw-bold" href="wishlist">Wishlist</a></li>
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
                <a href="wishlist"><i class="bi bi-heart"></i></a>
                <a href="cart"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['acces-login'])) : ?>

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
                <hr>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="profile-buyer ps-3 pt-3 pe-3 pb-4">
                    <div class="row">
                        <div class="col" style="max-width: 225px;">
                            <img class="border mb-3" src="../assets/images/profile/<?= $customer["picture"] ?>" alt=""
                                width="225px" height="225px">

                            <label for="select-picture" class="form-label btn btn-primary btn-sm"
                                style="width: 225px;">SELECT
                                IMAGE</label>
                            <input class="form-control d-none" type="file" id="select-picture" name="picture">
                            <input class="form-control d-none" type="text" id="select-picture" name="pictureOld"
                                value="<?= $customer["picture"] ?>" readonly>
                            <p class="mb-0">File size: 2,000,000 bytes (2 Megabytes) maximum. Allowed file extensions:
                                .PNG
                                only
                            </p>
                        </div>
                        <div class="col ms-5" style="max-width: 821px;">
                            <!-- Alert -->
                            <!-- Alert Succes -->
                            <?php if (isset($message)) : ?>
                            <?php foreach ($message as $message) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?= $message ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <!-- End Alert Succes -->
                            <!-- Alert Error -->
                            <?php if (isset($error)) : ?>
                            <?php foreach ($error as $error) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?= $error ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <!-- End Alert Error -->
                            <!-- End Alert -->
                            <h5>Personal Data</h5>
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-2">
                                    <input type="text" readonly class="form-control-plaintext" id="username"
                                        value="<?= $customer["username"] ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="fullname" autocomplete="off"
                                        value="<?= $customer["fullname"] ?>" name="fullname" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col">
                                    <input type="email" class="form-control-plaintext" id="email" autocomplete="off"
                                        value="<?= $customer["email"] ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="created" class="col-sm-2 col-form-label">Created At</label>
                                <div class="col-sm-4">
                                    <input type="text" readonly class="form-control-plaintext" id="created"
                                        value="<?= $customer["created"] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm float-end ps-3 pe-3 pb-1 pt-1"
                                name="save">SAVE</button>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <section id="mobile-view" class="container">
        <!-- Alert -->
        <!-- Alert Succes -->
        <?php if (isset($messagem)) : ?>
        <?php foreach ($messagem as $messagem) : ?>

        <!-- Modal -->
        <div class="modal" id="exampleModalAlert" style="background-color: #7B7B7B;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3 text-success" id="exampleModalLabel">Succes !</h1>
                    </div>
                    <div class="modal-body">
                        <?= $messagem ?>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>
        <!-- End Alert Succes -->
        <!-- Alert Error -->
        <?php if (isset($errorm)) : ?>
        <?php foreach ($errorm as $errorm) : ?>

        <!-- Modal -->
        <div class="modal" id="exampleModalAlert" style="background-color: #7B7B7B;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3 text-danger" id="exampleModalLabel">Warning !</h1>
                    </div>
                    <div class="modal-body">
                        <?= $errorm ?>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>

        <!-- End Alert Error -->
        <div class="card shadow text-cart-mobile-view" style="background-color: #ffffff;">
            <div class="pt-2 pb-2 ps-3 pe-3">
                <div class="row">
                    <div class="col" style="max-width: 65px;">
                        <img class="rounded-circle border" src="../assets/images/profile/<?= $customer["picture"] ?>"
                            alt="" width="50px" height="50px">
                    </div>
                    <div class="col" style="max-width: 275px;">
                        <p class="fw-bold mb-0 text-truncate"><?= $customer["fullname"] ?></p>
                        <a class="text-primary text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">Other</a>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">My Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2 text-center">
                                            <img class="border mb-2 rounded-circle border"
                                                src="../assets/images/profile/<?= $customer["picture"] ?>" alt=""
                                                width="115px" height="115px">
                                            <br>
                                            <label for="select-picture" class="form-label btn btn-primary btn-sm"
                                                style="width: 115px;">SELECT
                                                IMAGE</label>

                                        </div>
                                        <div class="mb-2">
                                            <label for="username" class="col-form-label">Username:</label>
                                            <input type="text" class="form-control" id="username"
                                                value="<?= $customer["username"] ?>" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fullname" class="col-form-label">Fullname:</label>
                                            <input type="text" class="form-control" id="fullname"
                                                value="<?= $customer["fullname"] ?>" name="fullname" autocomplete="off">
                                        </div>
                                        <div class="mb-2">
                                            <label for="email" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                value="<?= $customer["email"] ?>" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <label for="created" class="col-form-label">Created:</label>
                                            <input type="text" class="form-control" id="created"
                                                value="<?= $customer["created"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </form>
    <!-- End Profile -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <!-- JS Bootstrap 4.6 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <script>
    $('#exampleModalAlert').modal('show')
    </script>
</body>

</html>