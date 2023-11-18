<?php
session_start(); // Démarre une nouvelle session

if (!isset($_SESSION['address_count'])) {
  header('Location: formulaire.php'); // Redirigez si le nombre n'est pas défini
  exit();
}
// Récupère le nombre d'adresses à générer à partir de la variable de session
$address_count = $_SESSION['address_count'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="address_form.css">
  <title>Formulaire d'Adresses</title>
</head>
<body>

<form action="submit_address.php" method="post">
  <?php for ($i = 0; $i < $address_count; $i++): ?>
    <fieldset>
      <legend>Adresse <?php echo $i + 1; ?></legend>
      <label for="street_<?php echo $i; ?>">Rue:</label>
      <input type="text" id="street_<?php echo $i; ?>" name="streets[]" required><br>

      <label for="street_number_<?php echo $i; ?>">Numéro de rue:</label>
      <input type="number" id="street_number_<?php echo $i; ?>" name="street_numbers[]" required><br>

      <label for="type_<?php echo $i; ?>">Type:</label>
      <select id="type_<?php echo $i; ?>" name="types[]">
        <option value="livraison">Livraison</option>
        <option value="facturation">Facturation</option>
        
      </select><br>

      <label for="city_<?php echo $i; ?>">Ville:</label>
      <select id="city_<?php echo $i; ?>" name="cities[]">
        <option value="Montréal">Montréal</option>
        <option value="Laval">Laval</option>
        <option value="Longueuil">Longueuil</option>
        <option value="Trois-Rivières">Trois-Rivières</option>
        <option value="sherbrook">sherbrook</option>

        
      </select><br>

      <label for="postal_code_<?php echo $i; ?>">Code postal:</label>
      <input type="text" id="postal_code_<?php echo $i; ?>" name="postal_codes[]" pattern="[A-Za-z0-9]{6}" required><br>
    </fieldset>
  <?php endfor; ?>
  <input type="submit" value="Soumettre">
</form>

</body>
</html>
