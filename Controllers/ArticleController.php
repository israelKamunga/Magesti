<?php

require_once 'Entities/Article.php';

class ArticleController{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function AjouterArticle($article){

        try{
            $stmt = $this->conn->prepare("INSERT INTO Article(CodeArticle,Designation,PrixUnitaire,Quantite,Categorie) Values(?,?,?,?,?)");
            $result = $stmt->execute([$article->getCode(),$article->getDesignation(),$article->getPrixUnitaire(),$article->getQuantiteEnStock(),$article->getCategorie()]);
    
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
            $stmt = $this->conn->prepare("DELETE FROM article WHERE idArticle=:id");
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
            if( $stmt->execute() ){
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
            $stmt = $this->conn->prepare('UPDATE article SET CodeArticle=:CodeArticle, Designation=:Designation, PrixUnitaire=:PrixUnitaire, Quantite=:Quantite, Categorie=:Categorie WHERE IdArticle=:id');
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
}