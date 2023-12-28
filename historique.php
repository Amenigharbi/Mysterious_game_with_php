<?php
session_start();
$email = $_SESSION['id'];

include("connexion.php");

try {
    $stmt = $connexion->prepare("SELECT username FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $userId = $stmt->fetchColumn();
    $stmt->closeCursor();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $prop = $_POST['prop'];
    $essai = $_POST['essai'];
    $msg = $_POST['msg'];
    $rep = $_POST['rep'];

    $stmt = $connexion->prepare("INSERT INTO game (email, proposition, essai, message, reponse) VALUES (:email, :proposition, :essai, :message, :reponse)");

    // Bind parameters correctly
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':proposition', $prop);
    $stmt->bindParam(':essai', $essai);
    $stmt->bindParam(':message', $msg);
    $stmt->bindParam(':reponse', $rep);

    // Execute the query
    $stmt->execute();
    $stmt->closeCursor();

    echo "Data inserted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
