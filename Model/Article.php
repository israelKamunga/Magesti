<?php

class Article
{
    // Propriétés
    private $id;
    private $code;
    private $designation;
    private $presentation;
    private $categorie;
    private $prixRevient;
    private $prixVente;
    private $stockMinimum;
    private $quantite;
    

    // Constructeur
    public function __construct($code, $designation, $presentation, $categorie, $prixRevient, $prixVente,$stockMinimum, $quantite)
    {
        //$this->id = $id;
        $this->code = $code;
        $this->designation = $designation;
        $this->presentation = $presentation;
        $this->categorie = $categorie;
        $this->prixRevient = $prixRevient;
        $this->prixVente = $prixVente;
        $this->stockMinimum = $stockMinimum;
        $this->quantite = $quantite;
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

    public function getPresentation() {
        return $this->presentation;
    }

    public function setPresentation($presentation) {
        $this->presentation = $presentation;
    }

    public function getPrixRevient(): float {
        return $this->prixVente;
    }

    public function setPrixRevient($prixUnitaire): void {
        $this->prixUnitaire = $prixUnitaire;
    }

    public function getPrixVente():float{
        return $this->prixVente;
    }

    public function setPrixVente($prixVente) {
        $this->prixVente = $prixVente;
    }

    public function getstockMinimum() {
        return $this->stockMinimum;
    }

    public function setstockMinimum($stockMinimum) {
        $this->stockMinimum = $stockMinimum;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function getQuantite(){
        return $this->quantite;
    }

    public function setQuantite($quantite){
        $this->quantite = $quantite;
    }
}
