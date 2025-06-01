<?php

require_once __DIR__."/../Model/Article.php";
require_once __DIR__."/../config/Database.php";
//require_once(__DIR__ . '../Model/Article.php');
//require_once(__DIR__ . '/../config/Database.php');

if(isset($_GET["action"]) && isset($_GET["id"])){
    if(isset($articleController)){
        if($_GET["action"]=="supprimer"){
            $articleController->SupprimerArticle($_GET["id"]);
            header("Location: ../Views/GestionArticles.php");
        }
    }else{
        $articleController = new ArticleController(Database::getInstance()->getConnection());
        if($_GET["action"]=="supprimer"){
            $articleController->SupprimerArticle($_GET["id"]);
            header("Location: ../Views/GestionArticles.php");
        }
    }
}


class ArticleController{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function AjouterArticle($article){

        try{
            $stmt = $this->conn->prepare("INSERT INTO Articles(CodeArticle,Designation,Presentation,Categorie,prixrevient,prixvente,stockminimum,quantite) Values(?,?,?,?,?,?,?,?)");
            $result = $stmt->execute([$article->getCode(),$article->getDesignation(),$article->getPresentation(),$article->getCategorie(),$article->getPrixRevient(),$article->getPrixVente(),$article->getstockMinimum(),$article->getQuantite()]);
    
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }
    }

    public function SupprimerArticle($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM articles WHERE idArticle=:id");
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
            if( $stmt->execute() ){
                //header("Location : ../Views/GestionArticles.php");
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Erruer : '.$e->getMessage();
        }
    }

    public function ModifierArticle($id,$article){

        try{
            $stmt = $this->conn->prepare('UPDATE articles SET CodeArticle=:CodeArticle, Designation=:Designation, PrixUnitaire=:PrixUnitaire, Quantite=:Quantite, Categorie=:Categorie WHERE IdArticle=:id');
            $stmt->bindParam(':CodeArticle',$article->getCode(),PDO::PARAM_STR);
            $stmt->bindParam(':Designation',$article->getDesignation(),PDO::PARAM_STR);
            $stmt->bindParam(':PrixUnitaire',$article->getPrixUnitaire());
            $stmt->bindParam(':Quantite',$article->getQuantiteEnStock(),PDO::PARAM_INT);
            $stmt->bindParam(':Categorie',$article->getCategorie(),PDO::PARAM_STR);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo ''.$e->getMessage();
        }
    }

    public function ObtenirArticles(){
        $stmt = $this->conn->prepare("SELECT * FROM articles");
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($articles){
            return $articles;
        }else{
            return null;
        }
    }
}
