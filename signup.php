<?php
$errorMessage = '';
$successMessage = '';
$isError = false;
if(!empty($_POST['submit'])){
  
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte</title>
</head>
<body>
  <a href="index.php">Revenir à l'accueil</a>
  <form action="#" method="post">
    <label for="email">Email :</label>
    <br>
    <input type="email" name="email" id="email">
    <br><br>
    <label for="password">Mot de passe :</label>
    <br>
    <input type="password" name="password" id="password">
    <br><br>
    <label for="last-name">Nom :</label>
    <br>
    <input type="text" name="last-name" id="last-name">
    <br><br>
    <label for="first-name">Prénom</label>
    <br>
    <input type="text" name="first-name" id="firstname">
    <br><br>
    <input type="submit" name="submit" value="Créer un compte">
  </form>
</body>
</html>