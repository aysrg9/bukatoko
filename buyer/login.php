<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Acount</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Form Login -->
    <h1 class="fw-bold text-primary text-center head-brand" style="padding-top: 40px; padding-bottom:40px;">
        Bukatoko
    </h1>
    <section id="container-form" class="container shadow rounded" style="border: 3px solid gainsboro;">
        <form action="">
            <h3 class="text-center header-form">Let's login first!</h3>
            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary fw-bold">Login</button>
            </div>

            <hr>

            <p class="text-center">Don't have an account yet? <a class="text-primary" href="register.php"
                    style="text-decoration: none;">Register</a></p>
        </form>
    </section>
    <!-- End Form Login -->

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>