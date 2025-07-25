<?php
session_start();

require_once("../config/Database.php");
require_once("../Controllers/ArticleController.php");

if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}

$ArticleCtrl = new ArticleController(Database::getInstance()->getConnection());
$article = $ArticleCtrl->ObtenirArticle($_POST["CodeArticle"]);

if($article==null){
    header("Location: articlenontrouve.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étiquette Article</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/etiquette.css">
    <script src="../assets/js/etiquette.js" defer></script>
</head>

<body>
    <div class="etiquette-container">
        <div class="article-nom"><?php echo $article['Designation'];?></div>
        <div class="article-prix"><?php echo $article['PrixVente'];?> $</div>
        <div class="code-barres">
            <img src="https://barcode.tec-it.com/barcode.ashx?data=123456789012&code=EAN13&translate-esc=false"
                alt="Code-barres">
        </div>
    </div>

    <div class="actions" id="btnContainer">
        <button class="btn-print" id="btnImprimer">
            <i class="fa fa-print"></i> Imprimer
        </button>
        <button class="btn-cancel" id="btnRetour">
            <i class="fa fa-times"></i> Annuler
        </button>
    </div>
</body>

</html>