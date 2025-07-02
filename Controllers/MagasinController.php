<?php
class MagasinController
{

    private $db;

    public function __construct($db)
    {
        this->$db = $db;
    }

    public function getMagasins()
    {
        $stmt = $this->conn->prepare("SELECT * FROM magasin");
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($articles) {
            return $articles;
        } else {
            return null;
        }
    }

}
?>