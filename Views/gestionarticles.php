<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../index.php");
}

require_once("../config/Database.php");
require_once("../Controllers/ArticleController.php");

$ArticleCtrl = new ArticleController(Database::getInstance()->getConnection());
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestock - Gestion des Articles</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/gestionarticles.css">
  <script src="../assets/js/index.js" defer></script>
  <style>

  </style>
  </style>
</head>

<body>
  <!---Lister codes à récupérer--->
  <div class="wrapper" id="ListerCodesRecupPopup">
    <div class="form-container">
      <h2>Lister les codes à récpérer</h2>
      <form method="post" action="Etiquette.php">
        <div class="form-row">
          <div class="form-group">
            <label for="code">De</label>
            <input type="number" id="code" name="CodeArticle" required>
          </div>
          <div class="form-group">
            <label for="code">A</label>
            <input type="number" id="code" name="CodeArticle" required>
          </div>
        </div>
        <div class="form-buttons">
          <button type="button" class="btn btn-annuler" id="FermerPopupListerCodesRecup">Annuler</button>
          <button type="submit" class="btn btn-ajouter">Suivant</button>
        </div>
      </form>
    </div>
  </div>


  <!---Imprimer des etiquettes--->
  <div class="wrapper" id="ImprimerEtiquettePopup">
    <div class="form-container">
      <h2>Imprimer une etiquette</h2>
      <form method="post" action="Etiquette.php">
        <div class="form-row">
          <div class="form-group">
            <label for="code">Code Article</label>
            <input type="text" id="code" name="CodeArticle" required>
          </div>
        </div>
        <div class="form-buttons">
          <button type="button" class="btn btn-annuler" id="FermerPopupImprimerEtiquette">Annuler</button>
          <button type="submit" class="btn btn-ajouter">Suivant</button>
        </div>
      </form>
    </div>
  </div>

  <!---formulaire de duplication d'un article--->
  <div class="wrapper" id="dupliquerArticlePopup">
    <div class="form-container">
      <h2>Créer un article</h2>
      <form method="post" action="../Controllers/Articles/Ajouter.php">
        <div class="form-row">
          <div class="form-group">
            <label for="code">Code Article</label>
            <input type="text" id="code" name="CodeArticle" required>
          </div>
          <div class="form-group">
            <label for="code">Magasin</label>
            <input type="text" id="code" name="CodeArticle" required>
          </div>
        </div>
        <div class="form-buttons">
          <button type="button" class="btn btn-annuler" id="BtnFermerPopupDupliquerArticle">Annuler</button>
          <button type="submit" class="btn btn-ajouter">Ajouter</button>
        </div>
      </form>
    </div>
  </div>

  <!---formulaire de creation d'un article--->
  <div class="wrapper" id="createArticlePopup">
    <div class="form-container">
      <h2>Créer un article</h2>
      <form method="post" action="../Controllers/Articles/Ajouter.php">
        <div class="form-row">
          <div class="form-group">
            <label for="code">Code Article</label>
            <input type="text" id="code" name="CodeArticle" required>
          </div>
          <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" id="designation" name="Designation" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="presentation">Présentation</label>
            <input type="text" id="presentation" name="Presentation" required>
          </div>
          <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" id="categorie" name="Categorie" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="prixRevient">Prix Revient</label>
            <input type="number" id="prixRevient" name="PrixRevient" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="prixVente">Prix Vente</label>
            <input type="number" id="prixVente" name="PrixVente" step="0.01" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="stockMin">Stock Minimum</label>
            <input type="number" id="StockMinimum" name="StockMinimum" required>
          </div>
          <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" id="Quantite" name="Quantite" required>
          </div>
        </div>

        <div class="form-buttons">
          <button type="button" class="btn btn-annuler" id="FermerPopupCreationArticle">Annuler</button>
          <button type="submit" class="btn btn-ajouter">Ajouter</button>
        </div>
      </form>
    </div>
  </div>

  <!---Contenu principal--->
  <div class="maincontent">
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
    <div class="main">
      <div class="topbar">
        <div class="logo"><i class="fas fa-cube"></i> Gestock</div>
        <a href="../Controllers/User/Deconnecter.php" class="user-icon"><i class="fas fa-user-circle"></i></a>
      </div>
      <div class="content">
        <h1>Gestion des articles</h1>
        <div class="search-bar">
          <input type="text" placeholder="Rechercher un article...">
        </div>
        <div class="actions">
          <button id="listerCodeRecupBtn"><i class="fas fa-list"></i> Lister les codes à récupérer</button>
          <button id="imprimerEtiquetteBtn"><i class="fas fa-tag"></i> Imprimer des étiquettes</button>
          <button id="dupliquerArticleBtn"><i class="fas fa-copy"></i> Dupliquer un article</button>
          <button id="ouvrirFormBtn"><i class="fas fa-add"></i> Créer un article</button>
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
            if ($articles != null) {
              foreach ($articles as $article) {
                ?>
            <tr>
              <td>
                <?php echo $article["CodeArticle"] ?>
              </td>
              <td>
                <?php echo $article["Designation"] ?>
              </td>
              <td>
                <?php echo $article["Categorie"] ?>
              </td>
              <td>
                <?php echo $article["presentation"] ?>
              </td>
              <td>
                <?php echo $article["PrixRevient"] . " $" ?>
              </td>
              <td>
                <?php echo $article["PrixVente"] . " $" ?>
              </td>
              <td>
                <?php echo $article["StockMinimum"] ?>
              </td>
              <td>
                <?php echo $article["Quantite"] ?>
              </td>
              <td><a href="modifierarticle.php?id=<?php echo $article["IdArticle"]; ?>"
                  class="btn-action btn-edit">Modifier</a><a class="btn-action btn-delete"
                  href="../Controllers/ArticleController.php?action=supprimer&id=<?php echo $article["IdArticle"]; ?>">Supprimer</a>
            </tr>
            <?php
              }

            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>