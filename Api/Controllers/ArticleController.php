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
            $stmt = $this->conn->prepare("DELETE FROM article WHERE id=:id");
            $stmt->binParam(':id',$id, PDO::PARAM_INT);
    
            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo 'Erruer : '.$e->getMessage();
        }
    }

    public function ModifierArticle($id,$artcle){

        try{
            $stmt = $this->conn->prepare('UPDATE article SET CodeArticle=:CodeArticle, Designation=:Designation, PrixUnitaire=:PrixUnitaire, Quantite=:Quantite, Categorie=:Categorie');
        }catch(PDOException $e){
            echo ''.$e->getMessage();
        }
        return true;
    }
}