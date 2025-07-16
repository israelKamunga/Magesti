<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Popup - Liste des articles</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      width: 100%;
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

    .menu a:hover,
    .menu a.active {
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

    .wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100%;
      z-index: 1000;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 1200px;
      overflow-y: auto;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #1f3c88;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border: 1px solid #e3e6eb;
      border-radius: 12px;
      overflow: hidden;
    }

    th,
    td {
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
      text-decoration: none;
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
  </style>
</head>

<body>
  <div class="maincontent">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo"><i class="fas fa-cube"></i> Gestock</div>
      <div class="menu">
        <a href="#" class="active"><i class="fas fa-table-list"></i> Gestion des articles</a>
        <a href="#"><i class="fas fa-sliders-h"></i> Modification des quantités</a>
        <a href="#"><i class="fas fa-clock"></i> Consultation</a>
        <a href="#"><i class="fas fa-print"></i> Impression</a>
        <a href="#"><i class="fas fa-wrench"></i> Programme utilitaires</a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main">
      <!-- Topbar -->
      <div class="topbar">
        <div class="logo"><i class="fas fa-cube"></i> Gestock</div>
        <a href="../Controllers/User/Deconnecter.php" class="user-icon"><i class="fas fa-user-circle"></i></a>
      </div>

      <!-- Popup d'affichage des articles -->
      <div class="wrapper">
        <div class="form-container">
          <h2>Liste des articles</h2>
          <table>
            <thead>
              <tr>
                <th>Code Article</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Présentation</th>
                <th>Prix Revient</th>
                <th>Prix Vente</th>
                <th>Stock Min</th>
                <th>Quantité</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once("../config/Database.php");
              require_once("../Controllers/ArticleController.php");
              $ArticleCtrl = new ArticleController(Database::getInstance()->getConnection());
              $articles = $ArticleCtrl->ObtenirArticles();
              if ($articles) {
                foreach ($articles as $article) {
              ?>
                <tr>
                  <td><?= htmlspecialchars($article['CodeArticle']) ?></td>
                  <td><?= htmlspecialchars($article['Designation']) ?></td>
                  <td><?= htmlspecialchars($article['Categorie']) ?></td>
                  <td><?= htmlspecialchars($article['presentation']) ?></td>
                  <td><?= htmlspecialchars($article['PrixRevient']) ?> $</td>
                  <td><?= htmlspecialchars($article['PrixVente']) ?> $</td>
                  <td><?= htmlspecialchars($article['StockMinimum']) ?></td>
                  <td><?= htmlspecialchars($article['Quantite']) ?></td>
                  <td>
                    <a href="modifierarticle.php?id=<?= $article['IdArticle'] ?>" class="btn-action btn-edit">Modifier</a>
                    <a href="../Controllers/ArticleController.php?action=supprimer&id=<?= $article['IdArticle'] ?>" class="btn-action btn-delete">Supprimer</a>
                  </td>
                </tr>
              <?php }
              } else {
              ?>
                <tr><td colspan="9">Aucun article trouvé.</td></tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
