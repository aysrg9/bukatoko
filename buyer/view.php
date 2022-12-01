<?php

// session start
session_start();

// koneksi
require '../functions.php';

// query data product
$product = query("SELECT * FROM product");

// ambil data di url 
$id_product = $_GET["p"];

// query data product berdasarkan id
$prdct = query("SELECT * FROM product WHERE id_product = $id_product")[0];

// ambil id user
$id_user = $_SESSION['id_user'];

// select wishlist
$select_wishlist = mysqli_query($db, "SELECT * FROM wishlist WHERE id_product = '$id_product' AND id_user = '$id_user'") or
    die('query failed');

// waktu 
date_default_timezone_set('Asia/Jakarta');
$time = date("Y-m-d H:i:s");
$time_order = date("d M Y");

// wishlist
if (isset($_POST['wishlist'])) {
    // cek user login
    if (!isset($_SESSION['acces-login'])) {
        // jika belom
        header('Location: login');
    }
    // jika sudah login
    // ambil data
    $id_user = $_SESSION['id_user'];
    $id_product = $_GET['p'];
    $picture = $_POST['picture'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $select_wishlist = mysqli_query($db, "SELECT * FROM wishlist WHERE id_product = '$id_product' AND id_user = '$id_user'") or
        die('query failed');

    // cek apakah product sudah ada diwishlist atau belum
    if (mysqli_num_rows($select_wishlist) > 0) {
        $error[] = 'Product already added to wishlist!';
        $errorm[] = 'Product already added to wishlist!';
    } else {
        // jika belum ada di wishlist
        mysqli_query($db, "INSERT INTO wishlist (id_user, id_product, picture ,product_name, price) VALUES($id_user, $id_product, '$picture','$product_name', '$price')");
        $message[] = 'Product added to wishlist!';
        $messagem[] = 'Product added to wishlist!';
    }
}

// buynow
if (isset($_POST['checkout'])) {
    // cek user login
    if (!isset($_SESSION['acces-login'])) {
        // jika belum
        header('Location: login');
    }

    // cek quantity dan stock
    if ($_POST['quantity'] > $prdct['stock']) {
        $error[] = "Sorry, not enough stock!";
        $errorm[] = "Sorry, not enough stock!";
    } else {
        // jika user sudah login & qty < stock
        $_SESSION['p'] = $_GET['p'];
        $_SESSION['quantity'] = $_POST['quantity'];
        header('Location: order');
    }
}

// add to cart
if (isset($_POST['addtocart'])) {
    // cek apakah user sudah login
    if (!isset($_SESSION['acces-login'])) {
        // apabila belom login
        header('Location: login');
    }

    // proses ambil data
    // apabila sudah login, ambil id dari session
    $id_user = $_SESSION['id_user'];
    $id_product = $_GET['p'];
    $picture = $_POST['picture'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $stock_product = $prdct['stock'];
    $select_cart = mysqli_query($db, "SELECT * FROM cart WHERE id_product = '$id_product' AND id_user = '$id_user'") or
        die('query failed');

    // cek stock
    if ($quantity > $stock_product) {
        // jika stock tidak cukup
        $error[] = ' Sorry, not enough stock!';
        $errorm[] = ' Sorry, not enough stock!';
    } else {
        // cek apakah product sudah ada dicart atau belum
        if (mysqli_num_rows($select_cart) > 0) {
            $error[] = 'Product already added to cart!';
            $errorm[] = 'Product already added to cart!';
        } else {
            // jika stock cukup
            mysqli_query($db, "INSERT INTO cart (id_user, id_product, picture ,product_name, price,quantity) VALUES($id_user, $id_product, '$picture','$product_name', '$price', '$quantity')");
            $message[] = 'Product added to cart!';
            $messagem[] = 'Product added to cart!';
        }
    }
}
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
                <a href="../home" class="navbar-brand fs-2 text-primary fw-bold"
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form method="GET" action="../buyer/search" class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"
                            name="search"></i></button>
                </form>

                <!-- Cek user login -->
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
                                    data-bs-target="#exampleModall">Logout</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <button class="btn btn-primary"><a href="logout"
                                        class="text-light text-decoration-none">Logout</a></button>
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
    <!-- Start Navbar bottom -->
    <!-- Navbar bottom -->
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a onclick="history.go(-1);"><i class="bi bi-arrow-90deg-left text-primary"></i></a>
                <a href="wishlist"><i class="bi bi-heart"></i></i></a>
                <a href="cart"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['acces-login'])) : ?>

                <a href="../buyer/profile"><i class=" bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="../buyer/login"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>

            </div>
        </nav>
    </section>
    <!-- End Navbar bottom -->
    <!-- End Navbar -->

    <form method="POST" action="">
        <!-- Detail Product -->
        <!-- Dekstop View -->
        <section class="container" id="dekstop-view">
            <!-- Alert -->
            <!-- Alert Succes -->
            <?php if (isset($message)) : ?>
            <?php foreach ($message as $message) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $message ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!-- End Alert Succes -->
            <!-- Alert Error -->
            <?php if (isset($error)) : ?>
            <?php foreach ($error as $error) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $error ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!-- End Alert Error -->
            <!-- End Alert -->
            <div class="mb-3 bg-white card shadow" style="max-width: auto;">
                <div class="row g-0 mt-3 mb-3">
                    <div class="col-md-4" style="height: 300px; width: 300px;">
                        <img id="image-view-product" src="../assets/images/product/<?= $prdct["picture"] ?>"
                            class="img-fluid rounded-start" alt="Image Product">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $prdct["product_name"] ?></h5>
                            <h3 class="card-title fw-bold"><?= rupiah($prdct["price"]) ?></h3>
                            <p class="card-text">The products sold at the <b>Bukatoko</b> have been confirmed to
                                be 100%
                                original and have an official guarantee, for a warranty claim, you just have to come to
                                our
                                store. Thank you.</p>
                            <p class="card-text"><small class="text-muted">Stock <?= $prdct["stock"] ?></small></p>
                            <p class="card-text"><small class="text-muted">NOTE Minimum Purchase 1, Maximum Purchase
                                    50</small>
                            </p>

                            <a class="plus-minus text-decoration-none text-light" id="decrement"
                                onclick="stepper(this)"> - </a>

                            <input type="number" min="1" max="50" step="1" value="1" id="quantity" name="quantity">
                            <input type="text" value="<?= $prdct['picture'] ?>" readonly required style="display: none;"
                                name="picture">
                            <input type="text" value="<?= $prdct['product_name'] ?>" readonly required
                                style="display: none;" name="product_name">
                            <input type="text" value="<?= $prdct['price'] ?>" readonly required style="display: none;"
                                name="price">

                            <a class="plus-minus text-decoration-none text-light" id="increment"
                                onclick="stepper(this)"> + </a>

                            <div class="d-block pt-4">

                                <button type="submit" class="btn btn-primary btn fw-bold rounded me-2"
                                    name="addtocart">ADD
                                    TO
                                    CART</button>
                                <button type="submit" name="checkout" class="btn btn-primary btn fw-bold rounded">BUY
                                    NOW</button>
                                <?php if (mysqli_num_rows($select_wishlist) > 0) : ?>
                                <button type="submit" class="btn fw-bold rounded" name="wishlist"
                                    style="border: none;"><i class="bi bi-heart-fill fs-3 text-danger"></i></button>
                                <?php else : ?>
                                <button type="submit" class="btn fw-bold rounded" name="wishlist"
                                    style="border: none;"><i class="bi bi-heart fs-3"></i></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-sm card bg-white shadow mt-3">
                <h2 class="fw-bold pt-4">Product Description</h2>
                <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus tempore maxime
                    error
                    aliquid? A quia rerum sunt exercitationem optio veritatis ducimus, nesciunt est nostrum enim
                    dignissimos
                    alias, dicta nisi unde architecto dolores eius necessitatibus consectetur non incidunt. Quibusdam,
                    blanditiis accusantium officiis eius molestias illo ducimus, obcaecati expedita officia aspernatur
                    nemo.
                </p>
            </div>
        </section>
        <!-- End Dekstop View -->
    </form>

    <form method="POST" action="">
        <!-- Mobile View -->
        <section id="mobile-view">
            <div class="container-sm bg-white shadow">
                <img class="image-product" src="../assets/images/product/<?= $prdct["picture"] ?>" alt="Product">
                <h1 class="fw-bold pt-2 d-inline-block"><?= rupiah($prdct["price"]) ?></h1>
                <p style="font-size: 20px;"><?= $prdct["product_name"] ?></p>
                <p><small class="text-muted">Stock <?= $prdct["stock"] ?></small></p>
                <p><small class="text-muted">NOTE Minimum Purchase 1, Maximum Purchase
                        50</small></p>

                <a class="plus-minus text-decoration-none text-light" id="decrementmobile"
                    onclick="steppermobile(this)"> -
                </a>

                <input type="number" min="1" max="50" step="1" value="1" id="quantitymobile" name="quantity">
                <input type="text" value="<?= $prdct['picture'] ?>" readonly required style="display: none;"
                    name="picture">
                <input type="text" value="<?= $prdct['product_name'] ?>" readonly required style="display: none;"
                    name="product_name">
                <input type="text" value="<?= $prdct['price'] ?>" readonly required style="display: none;" name="price">

                <a class="plus-minus text-decoration-none text-light" id="incrementmobile"
                    onclick="steppermobile(this)"> +
                </a>

                <div class="pb-3 pt-4 rounded">
                    <button type="submit" class="btn btn-primary fw-bold me-1" name="addtocart">ADD
                        TO
                        CART</button>
                    <button type="submit" class="btn btn-primary fw-bold" name="checkout">BUY NOW</button>
                    <?php if (mysqli_num_rows($select_wishlist) > 0) : ?>
                    <button type="submit" class="btn fw-bold rounded" name="wishlist" style="border: none;"><i
                            class="bi bi-heart-fill fs-3 text-danger"></i></button>
                    <?php else : ?>
                    <button type="submit" class="btn fw-bold rounded" name="wishlist" style="border: none;"><i
                            class="bi bi-heart fs-3"></i></button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Alert -->
            <!-- Alert Succes -->
            <?php if (isset($messagem)) : ?>
            <?php foreach ($messagem as $messagem) : ?>

            <!-- Modal -->
            <div class="modal" id="exampleModal" style="background-color: #7B7B7B;">
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
            <div class="modal" id="exampleModal" style="background-color: #7B7B7B;">
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
            <!-- End Alert -->
            <div class="container-sm bg-white shadow mt-3">
                <h1 class="fw-bold pt-3">Product Description</h1>
                <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus tempore maxime
                    error
                    aliquid? A quia rerum sunt exercitationem optio veritatis ducimus, nesciunt est nostrum enim
                    dignissimos
                    alias, dicta nisi unde architecto dolores eius necessitatibus consectetur non incidunt. Quibusdam,
                    blanditiis accusantium officiis eius molestias illo ducimus, obcaecati expedita officia aspernatur
                    nemo.
                </p>
            </div>
            <div style="margin-top: 35px;">
                <h1 class="text-center text-white">margin</h1>
            </div>
        </section>
        <!-- End Mobile View -->
        <!-- End Detail Product -->
    </form>
    <!-- Input Stepper -->
    <script src="../assets/js/quantity.js"></script>

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
    $('#exampleModal').modal('show')
    </script>
</body>

</html>