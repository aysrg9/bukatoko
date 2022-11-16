<?php

session_start();

// koneksi
require '../functions.php';

// query data product
$product = query("SELECT * FROM product");

// ambil data di url 
$id_product = $_GET["id_product"];

//query data product berdasarkan id
$prdct = query("SELECT * FROM product WHERE id_product = $id_product")[0];
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
                <a href="../index.php" class="navbar-brand fs-2 text-primary fw-bold"
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form method="GET" action="../buyer/search.php" class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" autocomplete="off" required>
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"
                            name="search"></i></button>
                </form>
                <?php if (isset($_SESSION['login'])) : ?>

                <div id="button-navbar">
                    <a href="logout.php" style="text-decoration: none;" class=" fw-bold fs-5">Halo,
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
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a href="#" onclick="history.go(-1);"><i class="bi bi-arrow-90deg-left"></i></a>
                <a href="#"><i class="bi bi-heart"></i></i></a>
                <a href="#"><i class="bi bi-cart3"></i></a>

                <?php if (isset($_SESSION['login'])) : ?>

                <a href="../buyer/logout.php"><i class="bi bi-person-circle"></i></a>

                <?php else : ?>
                <a href="../buyer/login.php"><i class="bi bi-box-arrow-in-right"></i></a>

                <?php endif; ?>

            </div>
        </nav>
    </section>
    <!-- End Navbar -->

    <!-- Detail Product -->
    <!-- Dekstop View -->
    <section class="container" id="dekstop-view">
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
                            original and have an official guarantee, for a warranty claim, you just have to come to our
                            store. Thank you.</p>
                        <p class="card-text"><small class="text-muted">Stock <?= $prdct["stock"] ?></small></p>
                        <p class="card-text"><small class="text-muted">NOTE Minimum Purchase 1, Maximum Purchase
                                50</small>
                        </p>

                        <button class="plus-minus" id="decrement" onclick="stepper(this)"> - </button>
                        <input type="number" min="1" max="50" step="1" value="1" id="quantity">
                        <button class="plus-minus" id="increment" onclick="stepper(this)"> + </button>

                        <div class="d-block pt-3">
                            <button type="submit" class="btn btn-primary btn fw-bold rounded">ADD TO
                                CART</button>
                            <button type="submit" class="btn btn-primary btn fw-bold rounded">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sm card bg-white shadow mt-3">
            <h2 class="fw-bold pt-4">Product Description</h2>
            <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus tempore maxime error
                aliquid? A quia rerum sunt exercitationem optio veritatis ducimus, nesciunt est nostrum enim dignissimos
                alias, dicta nisi unde architecto dolores eius necessitatibus consectetur non incidunt. Quibusdam,
                blanditiis accusantium officiis eius molestias illo ducimus, obcaecati expedita officia aspernatur nemo.
            </p>
        </div>
    </section>
    <!-- End Dekstop View -->

    <!-- Mobile View -->
    <section id="mobile-view">
        <div class="container-sm bg-white shadow">
            <img class="image-product" src="../assets/images/product/<?= $prdct["picture"] ?>" alt="Product">
            <h1 class="fw-bold pt-2 d-inline-block"><?= rupiah($prdct["price"]) ?></h1>
            <p style="font-size: 20px;"><?= $prdct["product_name"] ?></p>
            <p><small class="text-muted">Stock <?= $prdct["stock"] ?></small></p>
            <p><small class="text-muted">NOTE Minimum Purchase 1, Maximum Purchase
                    50</small></p>

            <button class="plus-minus" id="decrement" onclick="stepper(this)"> - </button>
            <input type="number" min="1" max="50" step="1" value="1" id="quantity">
            <button class="plus-minus" id="increment" onclick="stepper(this)"> + </button>

            <div class="pb-3 pt-3 rounded">
                <a class="btn btn-primary text-white fw-bold" href="">ADD TO CART</a>
                <a class="btn btn-primary text-white fw-bold" href="">BUY NOW</a>
            </div>
        </div>
        <div class="container-sm bg-white shadow mt-3">
            <h1 class="fw-bold pt-3">Product Description</h1>
            <p class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus tempore maxime error
                aliquid? A quia rerum sunt exercitationem optio veritatis ducimus, nesciunt est nostrum enim dignissimos
                alias, dicta nisi unde architecto dolores eius necessitatibus consectetur non incidunt. Quibusdam,
                blanditiis accusantium officiis eius molestias illo ducimus, obcaecati expedita officia aspernatur nemo.
            </p>
        </div>
        <div style="margin-top: 35px;">
            <h1 class="text-center text-white">margin</h1>
        </div>
    </section>
    <!-- End Mobile View -->
    <!-- End Detail Product -->

    <!-- Input Stepper -->
    <script src="../assets/js/quantity.js"></script>

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>