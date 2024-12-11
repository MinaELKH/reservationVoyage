<?php
include 'db.php';
ob_start(); 
$title = "Accueil";
?>

<?php
$content = ob_get_clean(); 
include 'layout.php'; 

?>
