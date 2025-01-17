<?php

session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

 
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

 
    setcookie("username", $username, time() + (60 * 60 * 24 * 7));
    setcookie("password", $password, time() + (60 * 60 * 24 * 7));
}


setcookie('f', 'cookie', time() + 60 * 60 * 24);


if (!empty($_SESSION['saeed'])) {
    $_SESSION["saeed"]++; 
} else {
    $_SESSION["saeed"] = 1;  
}
$saeedCounter = $_SESSION["saeed"];


$cookieMessage = "";
if (isset($_COOKIE['f'])) {
    $cookieMessage = "تم إعداد الكوكيز بنجاح!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display and Handle User Data</title>
    
</head>
<body>
    <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])): ?>
        <h1>Username: <?= htmlspecialchars($_SESSION['username']) ?></h1>
        <h1>Password: <?= htmlspecialchars($_SESSION['password']) ?></h1>
    <?php else: ?>
        <h1>No data received!</h1>
    <?php endif; ?>

    <?php if (!empty($cookieMessage)): ?>
        <p><?= htmlspecialchars($cookieMessage) ?></p>
    <?php endif; ?>

    <p>زار الموقع: <?= $saeedCounter ?></p>

    <br><br>
    <a href="brea.html" style="background-color: white; padding: 10px; border-radius: 3px; text-decoration: none; color: black; font-weight: bold;">الرجوع إلى الصفحة</a>
</body>
</html>