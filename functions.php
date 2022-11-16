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

    $picture = strtolower($data["picture"]);
    $username = strtolower(stripslashes($data["username"]));
    $fullname = (stripslashes($data["fullname"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // cek username sudah ada atau belum 
    $result = mysqli_query($db, "SELECT username FROM customer WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        return false;
    }

    // enskirpsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO customer VALUES(id_user,'$picture','$username','$fullname','$email','$password')");

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