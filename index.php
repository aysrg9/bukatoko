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
                <a class="navbar-brand fs-2 text-primary" href="" style="font-family: 'Kanit', sans-serif;">Bukatoko</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        style="width: 400px;">
                    <button class="btn btn-outline-primary d-none" type="submit"><i class="bi bi-search"></i></button>
                </form>
                <div id="button">
                    <a class="btn btn-primary fw-bold">LOGIN</a>
                    <a class="btn btn-primary fw-bold">REGISTER</a>
                </div>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->

    <!-- Carousel -->
    <section id="carousel" style="padding-top: 150px; padding-bottom: 50px;">
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
                        <img src="./assets/images/carousel/bukagames.png" width="100%" height="400px"
                            class="d-block rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/carousel/bukareksa.png" width="100%" height="400px"
                            class="d-block w-100 rounded" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/images/carousel/murahmantap.png" width="100%" height="400px"
                            class="d-block w-100 rounded" alt="...">
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
    <section id="info-customer" class="container mb-5">
        <div class="shadow" style="background-color: #ffffff;">
            <div class="pt-3 pb-4 ps-3 pe-3">
                <h3 class="text-primary">For Egyditya</h3>
                <div class="card mt-3 d-inline-block" style="width: 17rem;">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Cashback 50%</h5>
                        <p class="card-text">Check Bukatoko Birthday Surprise for your first purchase.</p>
                    </div>
                </div>
                <div class="card mt-3 d-inline-block ms-2" style="width: 17rem;">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Free Shipping</h5>
                        <p class="card-text">Free shipping for the island of Java.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Info -->

    <!-- Product -->
    <section id="product" class="container">
        <div class="shadow" style="background-color: #ffffff;">
            <h3 class="pt-2 pb-2 text-center text-primary">Recommendation</h3>
        </div>
        <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3 mt-3">
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">Row column</div>
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