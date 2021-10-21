<?php

$host = "localhost";
$user = "estevamnet";
$pass = "archlinux";
$dbname = "jpautocenter";
$port = "3306";

// Conecxão com porta
$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

// Conexão sem a porta
// $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);