<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formulaire.css">
  <title>Entrée du Nombre d'Adresses</title>
  
</head>
<body>

<form action="handle_addresses.php" method="post">
  <label for="address_count">Combien d'adresses souhaitez-vous entrer ?</label>
  <input type="number" id="address_count" name="address_count" min="1" required>
  <input type="submit" value="Continuer">
</form>

</body>
</html>
