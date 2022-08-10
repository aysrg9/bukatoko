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
                <a class="navbar-brand fs-2 text-primary fw-bold" href=""
                    style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form class="d-flex" role="search">
                    <input class="input-search form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <div id="button-navbar">
                    <a href="./buyer/login.php" class="btn btn-primary fw-bold">LOGIN</a>
                    <a href="./buyer/register.php" class="btn btn-primary fw-bold">REGISTER</a>
                </div>
            </div>
        </nav>
    </section>
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a href="#" onclick="history.go(-1);"><i class="bi bi-arrow-90deg-left"></i></a>
                <a href="#"><i class="bi bi-heart"></i></i></a>
                <a href="#"><i class="bi bi-cart3"></i></a>
                <a href="#"><i class="bi bi-person-circle"></i></a>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->

    <!-- Detail Product -->
    <!-- Dekstop View -->
    <section class="container" id="dekstop-view">
        <div class="mb-3 bg-white card shadow" style="max-width: auto;">
            <div class="row g-0">
                <div class="col-md-4" style="height: 300px; width: 300px;">
                    <img id="image-view-product" src="../assets/images/product/62bb3f4a6be9a.png"
                        class="img-fluid rounded-start" alt="Image Product">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Prosesor Intel® Core™ i3 Generasi ke-12</h5>
                        <h3 class="card-title fw-bold">Rp 1.399.200,00</h3>
                        <p class="card-text testimonial">The products sold at the <b>Bukatoko</b> have been confirmed to
                            be 100%
                            original and have an official guarantee, for a warranty claim, you just have to come to our
                            store. Thank you.</p>
                        <p class="card-text"><small class="text-muted">Stock 5</small></p>
                        <p class="card-text"><small class="text-muted">NOTE Minimum Purchase 1</small>
                        </p>
                        <input type="number" value="1" min="1" style="width: 100px;">
                        <div class="d-block pt-3">
                            <button type="submit" class="btn btn-primary btn-sm fw-bold rounded">ADD TO
                                CART</button>
                            <button type="submit" class="btn btn-primary btn-sm fw-bold rounded">BUY NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dekstop View -->
    <!-- Mobile View -->
    <section id="mobile-view">
        <div class="container-sm bg-white shadow">
            <img class="image-product" src="../assets/images/product/62bb3f4a6be9a.png" alt="Product">
            <h1 class="fw-bold pt-2 d-inline-block">Rp1.399.999,00</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, assumenda?</p>
            <div class="pb-3 rounded">
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

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>