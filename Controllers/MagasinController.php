<?php
class MagasinController
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
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