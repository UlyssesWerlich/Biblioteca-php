<?php
    $host = 'localhost';
    $dbname = 'biblioteca';
    $user = 'root';
    $password = 'password';

    try {
      $pdo = new PDO( "mysql:host=$host;dbname=$dbname" , $user , $password );
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
    return $pdo;
?>