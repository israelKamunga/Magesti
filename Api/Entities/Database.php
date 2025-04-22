<?php

class Database
{
    private static $instance = null;
    private $connection;

    // Paramètres de connexion
    private $host = 'localhost';
    private $dbname = 'gestionstockapp';
    private $username = 'root';
    private $password = '';

    // Constructeur privé pour empêcher l’instanciation externe
    private function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode statique pour obtenir l'instance unique
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Méthode pour récupérer la connexion PDO
    public function getConnection()
    {
        return $this->connection;
    }
}
