<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "teman_belajar");
if (isset($_POST["signup"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $kota = $_POST["kota"];
    $tanggal_lahir = $_POST["tanggal"]." ".$_POST["bulan"]." ".$_POST["tahun"];
    $jenis_kelamin = $_POST["jeniskelamin"];
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO akun (nama, tempat_tinggal, tanggal_lahir, jenis_kelamin, email) VALUES ('$nama', '$kota', '$tanggal_lahir', '$jenis_kelamin', '$email')";
        mysqli_query($conn, $query);
        $_SESSION["email"] = $email;
        header("Location: reset_password.php");
        exit;
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <header>
        <img src="logo.jpg" alt="Logo" width="100">
        <h1>Daftar Akun</h1>
    </header>
    <?php if (isset($error)) { ?>
    <div class="container">
        <p>Email telah digunakan</p>
    </div>
    <?php } ?>
    <div class="container">
        <input type="text" name="nama" id="nama" placeholder="Nama panggilan atau nama">
        <input type="text" name="email" id="email" placeholder="Mobile number or email address">
        <label for="">Tempat tinggal?</label>
        <input type="text" name="kota" id="kota" placeholder="Kota">
        <label for="">Tanggal lahir?</label>
        <select name="tanggal" id="tanggal">
            <?php
            for ($i = 1; $i < 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <select name="bulan" id="bulan">
            <?php
            for ($i = 1; $i < 12; $i++) {
                echo "<option value='".date("F", mktime(0, 0, 0, $i))."'>".date("F", mktime(0, 0, 0, $i))."</option>";
            }
            ?>
        </select>
        <select name="tahun" id="tahun">
            <?php
            for ($i = 1900; $i < 2020; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <label for="jeniskelamin">Jenis kelamin?</label>
        <input type="radio" name="jeniskelamin" id="lakilaki" value="Laki-Laki">
        <label for="lakilaki">Laki-Laki</label>
        <input type="radio" name="jeniskelamin" id="perempuan" value="Perempuan">
        <label for="perempuan">Perempuan</label>
    </div>
    <div class="container">
        <p>People who use our service may have uploaded your contact information to Facebook. Learn more.</p>
        <p>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.</p>
    </div>
    <div class="container">
        <button type="submit" name="signup" id="signup">Sign up</button>
        <span><a href="login.php">Already have an account?</a></span>
    </div>
</form>
</body>
</html>
