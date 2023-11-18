<?php
session_start(); // Démarrez la session au début du script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $address_count = $_POST['address_count'];
  $_SESSION['address_count'] = $address_count; // Stockez le nombre dans la session
  header('Location: address_form.php'); // Redirigez vers le script du deuxième formulaire
  exit();
}
?>
