<?php
require_once "../../config/Database.php";
require_once "../ArticleController.php";
require_once "../../Model/Article.php";

$ArticleCtrl = new ArticleController(Database::getInstance()->getConnection());
$article = new Article(
    $_POST["CodeArticle"],
    $_POST["Designation"],
    $_POST["Presentation"],
    $_POST["Categorie"],
    (float) $_POST["PrixRevient"],
    (float) $_POST["PrixVente"],
    (int) $_POST["StockMinimum"],
    (int) $_POST["Quantite"]
);

if($ArticleCtrl->AjouterArticle($article)){
    header("Location: ../../Views/gestionarticles.php");
}else{
    echo "Une erreur s'est produite lors de l'insertation des données";
}

?>