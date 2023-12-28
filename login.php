<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['your_email'];
    $password = $_POST['password'];

    include("connexion.php");

    $stmt = $connexion->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['id'] = $email;
        header("location: jeu.php");
        exit();
    } else {
        header("location: jeu.php?login_error=1");
        exit();
    }
}
?>
