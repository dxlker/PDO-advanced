<?php
require "../db.php";

session_start();
if (!empty ($_SESSION['login_status'])){
    header("Location: dashboard.php");
    exit;
}

try{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = $pdo->login($_POST['email']);
        if ($login && password_verify($_POST['password'], $login['password'])){
            session_start();
            $_SESSION['login_status'] = true;
            header("Location:dashboard.php");
        } else{
            echo "Verkeerde inloggegevens";
            sleep(1);
        }
    }
}catch (PDOException $e){
    echo $e;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>