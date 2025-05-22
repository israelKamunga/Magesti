<?php
session_start();

require_once("../config/Database.php");
require_once("../Controllers/ArticleController.php");

$ArticleCtrl = new ArticleController(Database::getInstance()->getConnection());
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magesti - Gestion des Articles</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body{
      box-sizing: border-box;
    }

    .maincontent {
      display: flex;
      height: 100vh;
      background-color: #f9fbfd;
    }

    .sidebar {
      width: 250px;
      background-color: #1f3b71;
      color: white;
      padding: 20px;
    }

    .sidebar .logo {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar .logo i {
      font-size: 22px;
      color: #4eaaff;
    }

    .menu a {
      display: flex;
      align-items: center;
      gap: 10px;
      color: white;
      padding: 12px 10px;
      margin-bottom: 12px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 15px;
      transition: background 0.3s;
    }

    .menu a:hover, .menu a.active {
      background-color: #335296;
    }

    .menu a i {
      font-size: 16px;
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      height: 60px;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 25px;
      border-bottom: 1px solid #e1e4e8;
    }

    .topbar .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 20px;
      font-weight: bold;
      color: #1f3b71;
    }

    .topbar .logo i {
      color: #4eaaff;
    }

    .topbar .user-icon i {
      font-size: 20px;
      color: #4eaaff;
      background: #e5f0ff;
      padding: 10px;
      border-radius: 50%;
    }

    .content {
      padding: 30px;
      flex: 1;
      overflow-y: auto;
    }

    .content h1 {
      font-size: 26px;
      margin-bottom: 20px;
      color: #1f3b71;
    }

    .search-bar {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .search-bar input {
      padding: 10px 15px;
      width: 300px;
      border: 1px solid #d0d7e2;
      border-radius: 6px;
      font-size: 14px;
    }

    .actions {
      display: flex;
      gap: 12px;
      margin-bottom: 25px;
    }

    .actions button {
      background-color: #e5edff;
      color: #2a4fa2;
      border: 1px solid #c3d4fa;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .actions button i {
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border: 1px solid #e3e6eb;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
    }

    th {
      background-color: #f7f9fb;
      color: #445b84;
      font-size: 14px;
    }

    td {
      color: #333;
      font-size: 14px;
      border-top: 1px solid #f0f2f5;
    }

    .btn-action {
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      border: 1px solid transparent;
      cursor: pointer;
    }

    .btn-edit {
      background-color: #eef5ff;
      color: #2062cc;
      border-color: #b9d6ff;
      margin-right: 8px;
    }

    .btn-delete {
      background-color: #ffeeee;
      color: #e54545;
      border-color: #f5bcbc;
    }

    a{
      text-decoration: none;
    }

    /* creation article formulaire */
    .creationarticlecontaineur{
      display: none;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      position: absolute;
      left: 0;
      top: 0;
      z-index: 10000;
    }
    .creationarticlecontent {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 500px;
      height: 500px;
      padding: 30px;
      flex: 1;

    }

    .creationarticlecontent h1 {
      font-size: 26px;
      margin-bottom: 20px;
      color: #1f3b64;
    }

    .creationarticlecontent form {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      max-width: 600px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .creationarticlecontent label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      color: #1f3b64;
    }

    .creationarticlecontent input, select {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #d0d7e2;
      border-radius: 6px;
      font-size: 14px;
    }

    .creationarticlecontent button {
      background-color: #3a7afe;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .creationarticlecontent button:hover {
      background-color: #2e66d6;
    }
  </style>
</head>
<body>
  <!---formulaire de creation d'un article--->

  <div class="creationarticlecontaineur">
  <div class="creationarticlecontent">
    <h1>Créer un article</h1>
      <form>
        <div class="form-row">
          <div class="form-group">
            <label for="code">Code</label>
            <input type="text" id="code" name="code" required>
          </div>
          <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" id="designation" name="designation" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
          </div>
          <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" id="categorie" name="categorie">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="prixU">Prix unitaire (€)</label>
            <input type="number" id="prixU" name="prixU" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="prixV">Prix de vente (€)</label>
            <input type="number" id="prixV" name="prixV" step="0.01">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" id="quantite" name="quantite" required>
          </div>
        </div>
        <button type="submit">Créer l'article</button>
      </form>
    </div>
  </div>
  </div> 

<!---Contenu principal--->
  <div class="maincontent">
  <div class="sidebar">
    <div class="logo"><i class="fas fa-cube"></i> Magesti</div>
    <div class="menu">
      <a href="#" class="active"><i class="fas fa-table-list"></i> Gestion des articles</a>
      <a href="#"><i class="fas fa-sliders-h"></i> Modification des quantités</a>
      <a href="#"><i class="fas fa-clock"></i> Consultation</a>
      <a href="#"><i class="fas fa-print"></i> Impression</a>
      <a href="#"><i class="fas fa-wrench"></i> Programme utilitaires</a>
    </div>
  </div>
  <div class="main">
    <div class="topbar">
      <div class="logo"><i class="fas fa-cube"></i> Magesti</div>
      <div class="user-icon"><i class="fas fa-user-circle"></i></div>
    </div>
    <div class="content">
      <h1>Gestion des articles</h1>
      <div class="search-bar">
        <input type="text" placeholder="Rechercher un article...">
      </div>
      <div class="actions">
        <button><i class="fas fa-list"></i> Lister les codes à récupérer</button>
        <button><i class="fas fa-tag"></i> Imprimer des étiquettes</button>
        <button><i class="fas fa-copy"></i> Dupliquer un article</button>
        <a href="CreerArticle.php"><button><i class="fas fa-add"></i> Créer un article</button></a>
      </div>
      <table>
        <thead>
          <tr>
            <th>Code Article</th>
            <th>Designation</th>
            <th>Categorie</th>
            <th>Présentation</th>
            <th>Prix Revient</th>
            <th>Prix Vente</th>
            <th>Stock Minimum</th>
            <th>Quantite</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $articles = $ArticleCtrl->ObtenirArticles();
          //print_r($articles);
          //$cles_voulues = ["IdArticle", "CodeArticle", "Designation", "PrixUnitaire", "Quantite", "Categorie"];
          if($articles!=null){
            foreach ($articles as $article) {
              ?>
              <tr>
                <td><?php echo $article["CodeArticle"] ?></td>
                <td><?php echo $article["Designation"] ?></td>
                <td><?php echo $article["Categorie"] ?></td>
                <td><?php echo $article["presentation"] ?></td>
                <td><?php echo $article["PrixRevient"] ?></td>
                <td><?php echo $article["PrixVente"] ?></td>
                <td><?php echo $article["StockMinimum"] ?></td>
                <td><?php echo $article["Quantite"] ?></td>
                <td><button class="btn-action btn-edit">Modifier</button><a class="btn-action btn-delete" href="../Controllers/ArticleController.php?action=supprimer&id=<?php echo $article["IdArticle"]; ?>">Supprimer</a>
              </tr>
              <?php
              }
              
          }
          ?>
          
          
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>

</body>
</html>