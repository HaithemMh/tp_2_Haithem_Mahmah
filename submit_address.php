<?php
session_start();
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Informations de connexion à la base de données
  $servername = "localhost";
  $username = "root"; 
  $password = ""; 
  $dbname = "ecom1_tp2"; // Le nom de votre base de données

  // Créez une connexion
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Vérifiez la connexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Préparez la requête d'insertion
  $stmt = $conn->prepare("INSERT INTO addresses (street, street_number, address_type, city, postal_code) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sisss", $street, $street_number, $address_type, $city, $postal_code);

  // Récupérez et liez chaque adresse soumise
  foreach ($_POST['streets'] as $index => $streetValue) {
    $street = $streetValue;
    $street_number = $_POST['street_numbers'][$index];
    $address_type = $_POST['types'][$index];
    $city = $_POST['cities'][$index];
    $postal_code = $_POST['postal_codes'][$index];
    
    // Exécutez la requête d'insertion
    $stmt->execute();
  }

  // Fermez le statement et la connexion
  $stmt->close();
  $conn->close();

  // Redirigez ou affichez un message de succès
  echo "Adresses enregistrées avec succès.";
  // Vous pouvez ici rediriger vers une autre page si vous le souhaitez
}
?>
