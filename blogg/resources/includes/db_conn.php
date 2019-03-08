<?php
// variabler för anslutning till databasen.
$host = 'Localhost';
$dbname = 'blogg';
$user = 'Admin';
$password = 'qJcCBGOQ5erl8p4Y';

// Deklarerar vår variabel $sql för att undvika errors i ett senare skede.
$sql = '';

// variabel för sortering av data som hämtas från databasen.
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

// Variabel för att ange vart vi ansluter och hur teckenkodningen skall se ut.
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Skapar ett ny PDO-objekt som används när vi arbetar mot databasen.
$pdo = new PDO($dsn, $user, $password, $attr);
?>
