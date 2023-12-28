<?php
      $host='localhost';
      $root='root';
      $mdp='';
      $db='monjeu';


   $connexion = new PDO("mysql:host=localhost;dbname=monjeu", $root, $mdp);
   $connexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

?>
