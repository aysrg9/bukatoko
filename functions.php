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

// function register buyer
function registrasic($data)
{
    global $db;

    // ambil data dari form
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

    // cek maksimal karakter username = 8
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

// function change profile
function changeprofile($data)
{
    global $db;
    //ambil dari data dari tiap elemen dalam form
    $id_user = $_SESSION["id_user"];
    $fullname = htmlspecialchars($data["fullname"]);

    // cek apakah user pilih gambar baru atau tidak
    $pictureOld = htmlspecialchars($data["pictureOld"]);
    if ($_FILES['picture']['error'] === 4) {
        $picture = $pictureOld;
    } else {
        $picture = uploadpicture();
    }

    //query insert data
    $query = "UPDATE customer SET picture = '$picture', fullname = '$fullname' WHERE id_user =
    $id_user";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// function upload photo profile
function uploadpicture()
{
    $nameFile = $_FILES['picture']['name'];
    $sizeFile = $_FILES['picture']['size'];
    $tmpName = $_FILES['picture']['tmp_name'];

    //cek apakah yang diupload adalah gambar
    $extensionGambarValid = ['png', 'jpg', 'jpeg'];
    $extensionGambar = explode('.', $nameFile);

    // fungsi explode itu string jadi array , kalau nama
    // filenya person.png itu menjadi ['person','png']

    $extensionGambar = strtolower(end($extensionGambar));
    // cek apakah user upload gambar atau bukan
    if (!in_array($extensionGambar, $extensionGambarValid)) {
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($sizeFile > 2000000) {
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // dan generate nama baru
    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $extensionGambar;


    move_uploaded_file($tmpName, '../assets/images/profile/' . $nameFileBaru);
    return $nameFileBaru;
}