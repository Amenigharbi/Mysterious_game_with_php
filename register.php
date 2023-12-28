<?php
if(isset($_POST['register'])){
    $confirm_password = $_POST['comfirm_password'];
    $username = $_POST['your_username'];
    $email = $_POST['your_email'];
    $password = $_POST['password'];
    
    // Vérification si les mots de passe correspondent
    if ($password == $confirm_password) {
        include("connexion.php");

        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $req = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if (!$connexion->query($req)){
            echo "insertion échouée";
        } else {
            session_start();
            $_SESSION["id"] = $email;
            $arr = compact("email", "password");
            $val = implode(";", $arr);
            setcookie("User", $val, time() + (86400 * 30), NULL, NULL, FALSE, TRUE);

            header("location: jeu.php");
        }
    } else {
        echo "Les deux mots de passe doivent être identiques";
    }
}
?>
