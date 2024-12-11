<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'voyage';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) { 
    die("Erreur de connexion : " . mysqli_connect_error());
}
    //echo "Connexion db ok.";
?>