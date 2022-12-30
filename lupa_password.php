<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "teman_belajar");
if (isset($_POST["kirim"])) {
    $email = $_POST["email"];
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
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
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <div class="container">
        <img src="logo.jpg" alt="Logo">
        <h5>Lupa Password</h5>
    </div>
    <div class="container">
        <p>"Silakan masukkan alamat email yang ingin dikirim stel ulang password"</p>
    </div>
    <?php if (isset($error)) { ?>
    <div class="container">
        <p>Email tidak ditemukan</p>
    </div>
    <?php } ?>
    <div class="container">
        <input type="text" name="email" id="email" placeholder="Email" required>
    </div>
    <div class="container">
        <button type="submit" name="kirim" id="kirim">Kirim</button>
        <span><a href="login.php">Back to Login</a></span>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
