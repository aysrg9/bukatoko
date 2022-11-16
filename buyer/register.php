<?php

// koneksi
require '../functions.php';

// proses register
if (isset($_POST["submit"])) {
    if (registrasic($_POST) > 0) {
        // Alert Error
        $created = true;
    } else {
        echo mysqli_error($db);
    }
}
?>

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
        <form action="" method="POST">

            <h3 class="text-center header-form" style="padding-top: 35px; padding-bottom:35px;">Register first, come on!
            </h3>

            <!-- Alert -->
            <?php if (isset($created)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>User Created!</strong>
                <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button></a>
            </div>
            <?php endif; ?>
            <!-- End Alert -->

            <input type="text" value="person.png" id="picture" name="picture" style="display: none;">

            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                    id="username" max="8" required>
                <div id="usernameHelp" class="form-text">For example : aysrg9</div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="fullname" id="fullname" required>
                <div id="nameHelp" class="form-text">For example : Egyditya</div>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="email" id="email" required>
                <div id="emailHelp" class="form-text">For example : name@email.com</div>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" min="8"
                    required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password2" placeholder="Retype Password"
                    name="password2" min="8" required>
                <div id="passwordHelp" class="form-text">We will never share your data with others.</div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="submit" id="submit" class="btn btn-primary fw-bold">Register</button>
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