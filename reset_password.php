<?php
session_start();
if (isset($_POST["kirim"])) {
    $password = $_POST["password"];
    $konfirmasi = $_POST["konfirmasi"];
    $email = $_SESSION["email"];
    if ($password == $konfirmasi) {
        $query = "UPDATE akun SET kata_sandi = '$password' WHERE email = '$email'";
        mysqli_query($conn, $query);
        header("Location: ...");
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
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <div class="container">
        <img name="login_logo"src="logo.jpg" alt="Logo" width="100">
        <h5 name="lupa_pass_title">Lupa Password</h5>
    </div>
    <div class="container">
        <p name="silahkan_masukan_email">"Silakan masukkan password yang baru"</p>
    </div>
    <div class="container">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi password" required>
    </div>
    <?php if (isset($error)) { ?>
    <div class="container">
        <p name ="error">Konfirmasi password tidak valid</p>
        <style>
            #password,#konfirmasi{
                border: 5px solid red;
            }
        </style>
    </div>
    <?php } ?>
    <div class="container">
        <button type="submit" name="kirim" id="kirim">Kirim</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Style.css">
</body>
</html>