<?php

session_start();

// koneksi
require '../functions.php';

// cek form login
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM customer WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {

            // set session
            $_SESSION['id_user'] = $user['id_user'];
            // $_SESSION['picture'] = $user['picture'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            // $_SESSION['email'] = $user['email'];
            $_SESSION["acces-login"] = true;

            header("Location: ../home");
            exit;
        }
    }
    // Alert Error
    $error = true;
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
    <section id="container-form" class="container card shadow rounded" style="border: 3px solid gainsboro;">
        <form action="" method="POST">
            <h3 class="text-center header-form">Let's login first!</h3>

            <!-- Alert error -->
            <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid Username Or Password!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <!-- End Alert -->

            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                    required autocomplete="off">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="login" class="btn btn-primary fw-bold">Login</button>
            </div>

            <hr>

            <p class="text-center">Don't have an account yet? <a class="text-primary" href="register"
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