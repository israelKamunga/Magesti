<?php

class Article
{
    // Propriétés
    private $id;
    private $code;
    private $designation;
    private $description;
    private $prixUnitaire;
    private $quantiteEnStock;
    private $categorie;
    private $dateAjout;
    private $statut;

    // Constructeur
    public function __construct($code, $designation, $description, $prixUnitaire, $quantiteEnStock, $categorie)
    {
        //$this->id = $id;
        $this->code = $code;
        $this->designation = $designation;
        $this->description = $description;
        $this->prixUnitaire = $prixUnitaire;
        $this->quantiteEnStock = $quantiteEnStock;
        $this->categorie = $categorie;
        /*$this->dateAjout = $dateAjout;
        $this->statut = $statut;*/
    }

    // Getters et Setters

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getDesignation() {
        return $this->designation;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrixUnitaire() {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire($prixUnitaire) {
        $this->prixUnitaire = $prixUnitaire;
    }

    public function getQuantiteEnStock() {
        return $this->quantiteEnStock;
    }

    public function setQuantiteEnStock($quantiteEnStock) {
        $this->quantiteEnStock = $quantiteEnStock;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function getDateAjout() {
        return $this->dateAjout;
    }

    public function setDateAjout($dateAjout) {
        $this->dateAjout = $dateAjout;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}
