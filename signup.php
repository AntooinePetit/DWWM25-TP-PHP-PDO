<?php
$errorMessage = '';
$successMessage = '';
$isError = false;
if(!empty($_POST['submit'])){

  if(empty($_POST['email']) && $isError === false){
    $errorMessage = '<p style="color:red;">Veuillez renseigner l\'adresse mail.</p>';
    $isError = true;
  } else

  if(empty($_POST['password']) && $isError === false){
    $errorMessage = '<p style="color:red;">Veuillez renseigner le mot de passe.</p>';
    $isError = true;
  }

  if(empty($_POST['last-name']) && $isError === false){
    $errorMessage = '<p style="color:red;">Veuillez renseigner le nom.</p>';
    $isError = true;
  }

  if(empty($_POST['first-name']) && $isError === false){
    $errorMessage = '<p style="color:red;">Veuillez renseigner le prénom.</p>';
    $isError = true;
  }

  if($isError === false){
    require_once 'functions.php';

    if(verifyExistingUser($_POST['email']) === true){
      $errorMessage = '<p style="color:red;">Cet email est déjà utilisé</p>';
    } else {
      signUp($_POST['email'], $_POST['password'], $_POST['last-name'], $_POST['first-name']) >= 1 ? $successMessage = '<p style="color:green;">Compte enregistré !</p>' : $errorMessage = '<p style="color:red;">Erreur lors de l\'enregistrement du compte.</p>';
    }
  }

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
  <h1>Créer un compte</h1>
  <a href="index.php">Revenir à l'accueil</a>
  <?= $errorMessage ?>
  <?= $successMessage ?>
  <form action="#" method="post">
    <label for="email">Email :</label>
    <br>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="password">Mot de passe :</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br><br>
    <label for="last-name">Nom :</label>
    <br>
    <input type="text" name="last-name" id="last-name" required>
    <br><br>
    <label for="first-name">Prénom</label>
    <br>
    <input type="text" name="first-name" id="firstname" required>
    <br><br>
    <input type="submit" name="submit" value="Créer un compte">
  </form>
</body>
</html>