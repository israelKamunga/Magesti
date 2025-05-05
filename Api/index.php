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
    2,
    3,
    3,
    "Nourriture"
);
$articleController = new ArticleController($db);
$articleController->AjouterArticle($art);


// Routeur très simple
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if($_GET["operation"]=="connexion") {
        $result = UserController::connexion($_GET['UserName'],$_GET['Password'],$db);
        if($result!=null){
            http_response_code(200);
            echo json_encode(["UserName"=>$result["UserName"]]);
        }else{
            http_response_code(401);
            echo json_encode(["erreur"=>["utilisateur invalide"]]);
        }
    }
} else {
     // Méthode non autorisée
    echo json_encode(["message" => "Méthode non autorisée"]);
}
