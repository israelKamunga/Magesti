<?php
session_start();
require_once("config/Database.php");
require_once("Controllers/UserController.php");
require_once("Controllers/MagasinController.php");


if (!isset($db)) {
  $db = Database::getInstance()->getConnection();
}

if (!isset($MagasinCtrl)) {
  $MagasinCtrl = new MagasinController($db);
}

$errormessage = "";

if (isset($_SESSION["username"])) {
  header("Location: Views/gestionarticles.php");
  //exit();
} else {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $result = UserController::connexion($_POST['username'], $_POST['password'], $db);
    if ($result == null) {
      $errormessage = "Nom d'utilisateur ou mot de passe incorrect, veuillez réessayer";
    } else {
      $_SESSION['username'] = $result['UserName'];
      $_SESSION['magasin'] = $_POST['magasin'];
      header("Location: Views/gestionarticles.php");
    }
  }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Gestock</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
  <div class="login-container">
    <div class="login-header">
      <i class="fa-solid fa-box"></i>
      <span>Gestock</span>
    </div>
    <h2>Connexion</h2>
    <form method="post" action="">
      <label for="username">Nom d'utilisateur</label>
      <input type="text" id="username" name="username" placeholder="Entrez votre nom" required>
      <label for="password">Magasin</label>
      <select name="magasin" id="" type="text" required>
        <option value="" disabled selected hidden>-------Selectionnez le magasin------</option>
        <?php
        $Magasins = $MagasinCtrl->getMagasins();
        foreach ($Magasins as $magasin) {
          echo '<option value="' . $magasin["nomMagasin"] . '">' . $magasin["nomMagasin"] . '</option>';
        }
        ?>
      </select>
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
      <label for="" class="errormessagelabel"><?php echo $errormessage; ?></label>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>

</html>