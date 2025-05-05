<?php
session_start();
require_once("config/Database.php");
require_once("Controllers/UserController.php");

if(!isset($db)){
  $db = Database::getInstance()->getConnection();
}

if(isset($_SESSION["username"])){
  header("Location: Views/gestionarticles.php");
  //exit();
}else{
  $result = UserController::connexion($_POST['username'],$_POST['password'],$db);
  if($result==null){
  }else{
    $_SESSION['username'] = $result['UserName'];
    header("Location: Views/gestionarticles.php");
  }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Magesti</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>

    span{
        text-align: center;
    }

    h2{
        text-align: center;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: #f3f4f6;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-header {
      gap: 10px;
      margin-bottom: 30px;
    }
    .login-header i {
      font-size: 28px;
      color: #3b82f6;
    }
    .login-header span {
      font-size: 24px;
      font-weight: 600;
      color: #1f2937;
    }
    .login-container h2 {
      margin-bottom: 10px;
      font-size: 22px;
      color: #1f2937;
    }
    label {
      font-size: 14px;
      display: block;
      margin-top: 20px;
      color: #374151;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 14px;
    }
    button {
      margin-top: 30px;
      width: 100%;
      padding: 12px;
      background-color: #3b82f6;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #2563eb;
    }
    .login-footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }
    .login-footer a {
      color: #3b82f6;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <i class="fa-solid fa-box"></i>
      <span>Magesti</span>
    </div>
    <h2>Connexion</h2>
    <form method="post" action="">
      <label for="username">Nom d'utilisateur</label>
      <input type="text" id="username" name="username" placeholder="Entrez votre nom">

      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">

      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>
</html>