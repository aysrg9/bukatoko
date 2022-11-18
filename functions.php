<?php

// Connect DB
$db = mysqli_connect("localhost", "root", "", "bukatoko");

// function query
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function rupiah
function rupiah($angka)
{
    $hasil = "Rp " . number_format($angka, '2', ',', '.');
    return $hasil;
}

// Register Customer
function registrasic($data)
{
    global $db;

    $created = (stripslashes($data["created"]));
    $picture = strtolower($data["picture"]);
    $username = strtolower(stripslashes($data["username"]));
    $fullname = (stripslashes($data["fullname"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($db, "SELECT username FROM customer WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        $_POST['error'] = "Username Is Already In Use!";
        return false;
    }

    // cek maksimal karakter username
    if (strlen($username) > 8) {
        $_POST['error'] = "Username Maximum 8 Characters!";
        return false;
    }

    // cek email sudah ada atau belum 
    $result = mysqli_query($db, "SELECT email FROM customer WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        $_POST['error'] = "Email Is Already In Use!";
        return false;
    }

    // cek berapa karakter yang di input user
    if (strlen($password2) < 8) {
        $_POST['error'] = "Enter A Password Of At Least 8 Characters!";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        $_POST['error'] = "Invalid 2nd Password!";
        return false;
    }

    // enskirpsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO customer VALUES(id_user,'$picture','$username','$fullname','$email','$password','$created')");

    return mysqli_affected_rows($db);
}

// function search
function search($keyword)
{
    $query = "SELECT * FROM product
                WHERE
                product_name LIKE '%$keyword%' OR 
                stock LIKE '%$keyword%' OR
                price LIKE '%$keyword%'
            ";
    return query($query);
}