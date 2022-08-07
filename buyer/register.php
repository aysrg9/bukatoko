<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Acount</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Form Register -->
    <h1 class="fw-bold text-primary text-center head-brand" style="padding-top: 40px; padding-bottom:40px;">
        Bukatoko
    </h1>
    <section id="container-form" class="container shadow rounded"
        style="border: 3px solid gainsboro; margin-bottom: 50px;">
        <form action="">
            <h3 class="text-center header-form" style="padding-top: 35px; padding-bottom:35px;">Register first, come on!
            </h3>
            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username">
                <div id="usernameHelp" class="form-text">For example: aysrg9</div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="name" placeholder="Your Name">
                <div id="nameHelp" class="form-text">For example: Egyditya</div>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Your Email">
                <div id="emailHelp" class="form-text">For example: name@email.com</div>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="repassword" placeholder="Retype Password">
                <div id="passwordHelp" class="form-text">We will never share your data with others.</div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary fw-bold">Register</button>
            </div>

            <hr>

            <p class="text-center">Already have an account? <a class="text-primary" href="login.php"
                    style="text-decoration: none;">Login</a></p>
        </form>
    </section>
    <!-- End From Register -->

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>