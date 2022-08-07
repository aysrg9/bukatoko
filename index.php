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
    <link rel="stylesheet" href="./assets/css/style.css">
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
                    <a class="btn btn-primary fw-bold">LOGIN</a>
                    <a href="./buyer/register.php" class="btn btn-primary fw-bold">REGISTER</a>
                </div>
            </div>
        </nav>
    </section>
    <section id="nav-bottom">
        <nav class="nav-icon navbar fixed-bottom">
            <div class="container">
                <a href="#"><i class="bi bi-house"></i></a>
                <a href="#"><i class="bi bi-heart"></i></i></a>
                <a href="#"><i class="bi bi-cart3"></i></a>
                <a href="#"><i class="bi bi-person-circle"></i></a>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->

    <!-- Carousel -->
    <section id="carousel">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/images/carousel/bukagames.png" class="d-block rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/carousel/bukareksa.png" class="d-block w-100 rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/carousel/murahmantap.png" class="d-block w-100 rounded" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End Carousel -->

    <!-- Info -->
    <section id="info-customer" class="container">
        <div class="shadow" style="background-color: #ffffff;">
            <div class="pt-3 pb-4 ps-3 pe-3">
                <h3 class="text-primary fw-bold">For Egyditya</h3>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Cashback 50%</h5>
                        <p class="card-text">Check Bukatoko Birthday Surprise for your first purchase.</p>
                    </div>
                </div>
                <div class="card-customer card mt-3 d-inline-block">
                    <div class="card-body bg-primary text-white rounded">
                        <h5 class="card-title fw-bold">Free Shipping</h5>
                        <p class="card-text">Free shipping for the island of Java. Checkout now!.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Info -->

    <!-- Product -->
    <section id="product" class="container">
        <div id="banner-recomend" class="shadow" style="background-color: #ffffff;">
            <h3 class="pt-2 pb-2 text-center text-primary fw-bold">Recommendation Product</h3>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-sm-2 mt-3">
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate ">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 shadow-sm bg-white">
                    <div style="width: auto;">
                        <img src="./assets/images/product/62bb3f4a6be9a.png" class="card-img-top" alt="...">
                        <div class="card-body pt-3">
                            <p class="card-title text-truncate">Prosesor Intel® Core™ i3-12100F</p>
                            <p class="card-title pt-2 fw-bold">Rp 1.399.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product -->

    <!-- JS Bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>