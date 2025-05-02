<?php
header("Content-Type: application/json");

require_once 'Entities/Database.php';
require_once 'Controllers/ArticleController.php';
require_once 'Controllers/UserController.php';

$db = Database::getInstance()->getConnection();
$art = new Article(
    "Yahourt",
    "Yahourt fait à base de lait",
    "Biscuit cookies faits à base de lait",
    23,
    10,
    "Nourriture");
$articleController = new ArticleController($db);


// Routeur très simple
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    /*if (isset($_GET['id'])) {
        $articleController->getArticle($_GET['id']);
    } else {
        $articleController->getArticles();
    }
    if($articleController->ModifierArticle(2,$art)) {
        echo json_encode(["message" => "La modification a reussie"]);
    }else{
        
        echo json_encode(["message" => "SUCCESS"]);
    }
    */
    if($_GET["operation"]=="connexion") {
        //if(UserController::connexion($_GET('UserName'),$_GET('Password'),$db)!=null){
        //}
        echo json_encode(UserController::connexion($_GET['UserName'],$_GET['Password'],$db));
    }


} else {
    http_response_code(405); // Méthode non autorisée
    echo json_encode(["message" => "Méthode non autorisée"]);
}
