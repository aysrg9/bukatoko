<?php

// waktu 
date_default_timezone_set('Asia/Jakarta');
$time = date("d M Y");

// Session Start
session_start();

// Connect
require '../functions.php';

// cek user login
if (isset($_SESSION['acces-login'])) {
    // jika sudah login ambil data dari session
    $id_user = $_SESSION['id_user'];
    $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
} else {
    // jika belum
    header('Location: login');
}

// ambil data
$id_product = $_SESSION["p"];

//query data product berdasarkan id
$prdct = query("SELECT * FROM product WHERE id_product = $id_product")[0];

// bill handling
$handlingfee = 1000;
$shippingfee = 15000;
// from database berdasarkan id
$unit_price = $prdct['price'];
// from page view
$quantity = $_SESSION['quantity'];
// penjumlahan satuan barang di kali banyaknya quantity
$result = $unit_price * $quantity;
// penjumlahan satuan barang di kali banyaknya quantity + biaya tambahan lainnya
$totalpayment = $result + $handlingfee + $shippingfee;

// checkvoucher
if (isset($_POST['checkvoucher'])) {
    // from input html
    $inputuser = strtoupper($_POST['voucher']);
    // cek button checkvoucher
    if ($inputuser < 0) {
        $failed[] = "Sorry, the voucher code you entered is invalid!";
    } else {
        // query database
        $vch = query("SELECT * FROM voucher WHERE code_voucher = '$inputuser'")[0];
        $diskon = $vch['piece'];
        // cek apakah code yang di masukan user = yang ada di database
        if ($inputuser == $vch['code_voucher']) {
            // set session totalpayment
            $totalbill = $totalpayment - $diskon;
            // tampilkan alert
            $vchsucces[] = "";
            $vchsuccesm[] = "";
            $message[] = "Succes, your voucher code has been installed";
            $messagem[] = "Succes, your voucher code has been installed";
            $_POST['voucher'] = strtoupper($inputuser);
        } else {
            // jika code user tidak sama dengan yang ada di database
            $failed[] = "Sorry, the voucher code you entered is invalid!";
            $failedm[] = "Sorry, the voucher code you entered is invalid!";
            $_POST['voucher'] = "";
        }
    }
}


// edit qty
if (isset($_POST['editquantity'])) {
    $editqty = $_POST['quantity'];
    $_SESSION['quantity'] = $editqty;
    header('Location: order');
}

// ordernow
if (isset($_POST['order'])) {
    // ambil data

    // idorder
    // uniqid
    $id_order = strtoupper(uniqid());
    // pemisah
    $id_order .= '/';
    // username user
    $id_order .= $username;
    // alamat user
    $address = $_POST['addresss'];
    // product yang di beli
    $product_name = $prdct['product_name'];
    // harga
    $price = $prdct['price'];
    // total price

    // cek apakah user menggunakan promo
    if (isset($_POST['totalbill'])) {
        // jika user menggunakan promo
        $total_price = $_POST['totalbill'];
    } else {
        // jika user tidak menggunakan promo
        $total_price = $totalpayment;
    }

    // berapa banyak qty
    $quantity = $_SESSION['quantity'];
    // waktu pemesanan
    $created = $time;

    // cek stock
    if ($quantity > $prdct['stock']) {
        $error[] = "Sorry, not enough stock!";
    } else {
        // cek column address (minimal 20 karakter)
        if ($address < 20) {
            $error[] = "Minimum 20 characters!";
        } else {
            // insert to db jika semua validasi berhasil
            mysqli_query($db, "INSERT INTO buy (id_order, id_user ,product_name, price ,total_price, quantity, address, created) VALUES('$id_order', $id_user,  '$product_name', '$price','$total_price', '$quantity', '$address', '$created')");
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

<body style="overflow-x: hidden;">
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

    <!-- Navbar Bottom -->
    <section id="nav-bottom">

        <nav class="nav-icon navbar fixed-bottom">

            <div class="container">
                <a href="home"><i class="bi bi-house"></i></a>
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

    <!-- Checkout -->
    <form method="POST">
        <section id="dekstop-view" class="checkout container">

            <h3>Checkout</h3>

            <div class="alert alert-warning card shadow fw-bold" role="alert">
                Make sure the voucher is installed correctly before you checkout!
            </div>

            <div class="card shadow mb-3">
                <label for="address" class="ms-3 me-3 mb-3 mt-3 mb-1 fw-bold fs-4">Shipping Address</label>

                <!-- Alert Error -->
                <?php if (isset($error)) : ?>
                <?php foreach ($error as $error) : ?>
                <div class="alert alert-danger alert-dismissible fade show ms-3 me-3" role="alert">
                    <strong><?= $error ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Error -->

                <textarea type="text" class="ms-3 me-3 mt-3 mb-4" id="address" name="addresss"
                    style="border: none; outline: none; resize: none; height: auto;"
                    placeholder="For Example : Jl Kita Bisa No.1 RT001/04 Kel. Batu Ceper, Kec. Cibodad, 15416, Jakarta, Indonesia"
                    autocomplete="off" autofocus="on"></textarea>
            </div>

            <div class="card shadow mb-3">
                <div class="row g-0 mb-2">
                    <div class="col" style="max-width: 100px;">
                        <img src="../assets/images/product/<?= $prdct["picture"] ?>"
                            class="img-fluid rounded-start mt-3 ms-3" alt="..." width="90px" height="90px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-truncate mb-1"><?= $prdct["product_name"] ?></h5>

                            <?php if (!isset($_POST['editquantity'])) : ?>

                            <p class="card-text mb-1">Quantity <?= $_SESSION['quantity'] ?> <a href=""
                                    class="text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Edit</a></p>

                            <?php else : ?>

                            <p class="card-text mb-1">Quantity <?= $_SESSION['quantity'] ?> <a href=""
                                    class="text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Edit</a></p>

                            <?php endif; ?>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="background-color: gainsboro;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Quantity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mb-3 mt-3 text-center">

                                            <a class="plus-minus text-decoration-none text-light" id="decrement"
                                                onclick="stepper(this)"> -
                                            </a>

                                            <input type="number" min="1" max="50" step="1"
                                                value="<?= $_SESSION['quantity'] ?>" id="quantity" name="quantity">

                                            <a class="plus-minus text-decoration-none text-light" id="increment"
                                                onclick="stepper(this)"> +
                                            </a>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="editquantity" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="card-text">Price <?= rupiah($prdct["price"]) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-3">

                <label for="voucher" class="ms-3 me-3 mt-3 mb-3 fw-bold fs-4">Voucher</label>

                <!-- Alert -->

                <!-- Alert Succes -->
                <?php if (isset($message)) : ?>
                <?php foreach ($message as $message) : ?>
                <div class="alert alert-success alert-dismissible fade show me-3 ms-3" role="alert">
                    <strong><?= $message ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Succes -->

                <!-- Alert Error -->
                <?php if (isset($failed)) : ?>
                <?php foreach ($failed as $failed) : ?>
                <div class="alert alert-danger alert-dismissible fade show ms-3 me-3" role="alert">
                    <strong><?= $failed ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Error -->

                <!-- End Alert -->

                <?php if (isset($_POST['voucher'])) : ?>

                <div class="input-group mb-3">
                    <input type="text" class="form-control me-3 ms-3" placeholder="freeshipping" name="voucher"
                        value="<?= $_POST['voucher'] ?>" autocomplete="off">
                </div>

                <button type="submit" name="checkvoucher" class="btn btn-primary btn-sm me-3 ms-3 mb-4 pt-2 pb-2"
                    style="width: 130px;">CHECK VOUCHER</button>

                <?php else : ?>

                <div class="input-group mb-3">
                    <input type="text" class="form-control me-3 ms-3" placeholder="freeshipping" name="voucher"
                        autocomplete="off">
                </div>

                <button type="submit" name="checkvoucher" class="btn btn-primary btn-sm me-3 ms-3 mb-4 pt-2 pb-2"
                    style="width: 130px;">CHECK VOUCHER</button>

                <?php endif; ?>

            </div>

            <div class="card shadow">
                <h3 class="ms-3 mt-3 mb-4 fw-bold">Total Bill</h3>
                <hr class="me-3 ms-3 mt-0">

                <!-- Alert Succes -->
                <?php if (isset($vchsucces)) : ?>
                <?php foreach ($vchsucces as $vchsucces) : ?>
                <div class="alert alert-success alert-dismissible fade show me-3 ms-3" role="alert">
                    <strong>Congratulations, You get a big discount <?= rupiah($diskon) ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Succes -->

                <div class="ms-3">
                    <p class="text-muted">Subtotals for Products : <?= rupiah($result) ?>
                    </p>
                    <p class="text-muted">Shipping Fee : <?= rupiah($shippingfee) ?></p>
                    <p class="text-muted">Handling Fee : <?= rupiah($handlingfee) ?></p>

                    <?php if (isset($totalbill)) : ?>

                    <p class="text-muted">Total Payment : <span class="fs-3"><?= rupiah($totalbill) ?></span></p>
                    <input type="text" name="totalbill" value="<?= $totalbill ?>" class="d-none" readonly>

                    <?php else : ?>

                    <p class="text-muted">Total Payment : <span class="fs-3"><?= rupiah($totalpayment) ?></span></p>

                    <?php endif; ?>

                </div>
                <hr class="me-3 ms-3 mt-0">
                <button type="submit" name="order" class="btn btn-primary mb-4 ms-3 me-3" style="width: 130px;">BUY
                    NOW</button>
            </div>

        </section>
    </form>

    <section id="mobile-view" class="checkout">
        <form method="POST">
            <div class="card shadow mb-3" style="margin-top: 82px;">
                <label for="address" class="ms-3 me-3 mt-3 mb-1 fw-bold fs-4">Shipping Address</label>
                <textarea type="text" class="ms-3 me-3 mt-3 mb-4" id="address" name="address"
                    style="border: none; outline: none; resize: none; height: auto;"
                    placeholder="For Example : Jl Kita Bisa No.1 RT001/04 Kel. Batu Ceper, Kec. Cibodad, 15416, Jakarta, Indonesia"
                    autocomplete="off" autofocus="on"></textarea>
            </div>

            <div class="card shadow mb-3">
                <div class="row">
                    <div class="col ms-2 mt-4 mb-4 me-3" style="max-width: 80px;">
                        <img src="../assets/images/product/<?= $prdct['picture'] ?>" alt="" width="80px" height="80px"
                            class="">
                    </div>
                    <div class="col mt-4 mb-4">
                        <p class="mb-0 pb-1"><?= $prdct['product_name'] ?></p>
                        <p class="mb-0 pb-1">Quantity <?= $_SESSION['quantity'] ?></p>
                        <p class="mb-0">Price <?= rupiah($prdct['price']) ?></p>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-3">
                <label for="voucher" class="ms-3 me-3 mt-3 mb-3 fw-bold fs-4">Voucher</label>

                <!-- Alert -->
                <!-- Alert Succes -->
                <?php if (isset($messagem)) : ?>
                <?php foreach ($messagem as $messagem) : ?>
                <div class="alert alert-success alert-dismissible fade show me-3 ms-3" role="alert">
                    <strong><?= $messagem ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Succes -->
                <!-- Alert Error -->
                <?php if (isset($failedm)) : ?>
                <?php foreach ($failedm as $failedm) : ?>
                <div class="alert alert-danger alert-dismissible fade show ms-3 me-3" role="alert">
                    <strong><?= $failedm ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Error -->
                <!-- End Alert -->

                <?php if (isset($_POST['voucher'])) : ?>

                <div class="input-group mb-3">
                    <input type="text" class="form-control me-3 ms-3" placeholder="freeshipping" name="voucher"
                        value="<?= $_POST['voucher'] ?>" autocomplete="off">
                </div>

                <button name="checkvoucher" class="btn btn-primary btn-sm me-3 ms-3 mb-4 pt-2 pb-2"
                    style="width: 130px;">CHECK VOUCHER</button>

                <?php else : ?>

                <div class="input-group mb-3">
                    <input type="text" class="form-control me-3 ms-3" placeholder="freeshipping" name="voucher"
                        autocomplete="off">
                </div>

                <button name="checkvoucher" class="btn btn-primary btn-sm me-3 ms-3 mb-4 pt-2 pb-2"
                    style="width: 130px;">CHECK VOUCHER</button>

                <?php endif; ?>
            </div>

            <div class="card shadow" style="margin-bottom: 82px;">
                <h3 class="ms-3 mt-3 mb-4 fw-bold">Total Bill</h3>

                <hr class="me-3 ms-3 mt-0">

                <!-- Alert Succes -->
                <?php if (isset($vchsuccesm)) : ?>
                <?php foreach ($vchsuccesm as $vchsuccesm) : ?>
                <div class="alert alert-success alert-dismissible fade show me-3 ms-3" role="alert">
                    <strong>Congratulations, You get a big discount <?= rupiah($diskon) ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <!-- End Alert Succes -->

                <div class="ms-3">
                    <p class="text-muted">Subtotals for Products : <?= rupiah($result) ?>
                    </p>
                    <p class="text-muted">Shipping Fee : <?= rupiah($shippingfee) ?></p>
                    <p class="text-muted">Handling Fee : <?= rupiah($handlingfee) ?></p>
                    <p class="text-muted">Total Payment : <span class="fs-3"><?= rupiah($totalpayment) ?></span></p>
                </div>

                <hr class="me-3 ms-3 mt-0">

                <button class="btn btn-primary mb-4 ms-3 me-3" style="width: 130px;">BUY NOW</button>
            </div>
        </form>
    </section>

    <!-- End Checkout -->

    <script src="../assets/js/quantity.js"></script>

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>

</html>