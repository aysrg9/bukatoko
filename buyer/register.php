<?php

// koneksi
require '../functions.php';

// jika tombol submit ditekan
if (isset($_POST["submit"])) {

    if (registrasic($_POST) > 0) {
        // Alert jika user berhasil dibuat
        $created[] = 'User Created !';
    } else {
        // Alert error
        $error[] = $_POST['error'];
    }
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
    <title>Register Acount</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Fix Confirm Form Resubmission -->
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

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
    <section id="container-form" class="container cart shadow rounded"
        style="border: 3px solid gainsboro; margin-bottom: 50px;">
        <form method="POST">

            <h3 class="text-center header-form" style="padding-top: 35px; padding-bottom:35px;">Register first, come on!
            </h3>

            <!-- Alert -->
            <!-- Alert Succes -->
            <?php if (isset($created)) : ?>
            <?php foreach ($created as $created) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $created ?></strong>
                <button onclick="location.href = 'login';" type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
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

            <input type="text" value="<?php echo $time; ?>" name="created" style="display: none;" readonly required>
            <input type="text" value="person.png" id="picture" name="picture" style="display: none;" readonly required>

            <div class="mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                    id="username" max="8" required autocomplete="off">
                <div id="usernameHelp" class="form-text">For example : aysrg9</div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="fullname" id="fullname" required
                    autocomplete="off">
                <div id="nameHelp" class="form-text">For example : Egyditya</div>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="email" id="email" required
                    autocomplete="off">
                <div id="emailHelp" class="form-text">For example : name@email.com</div>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" min="8"
                    required autocomplete="off">
                <div id="usernameHelp" class="form-text">Minimum 8 Characters</div>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password2" placeholder="Retype Password"
                    name="password2" min="8" required autocomplete="off">
                <div id="passwordHelp" class="form-text">We will never share your data with others.</div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="submit" id="submit" class="btn btn-primary fw-bold">Register</button>
            </div>

            <hr>

            <p class="text-center">Already have an account? <a class="text-primary" href="login"
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