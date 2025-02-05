<?php

// require_once './../Model/User.php';
// require_once '../../Core/Database.php';

class User {
    private $id;  
    private $nom;
    private $prenom;
    private $email;
    private $mot_de_passe;
    private $role;
    private $date_creation;

    public function __construct() {
       

    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMotDePasse() {
        return $this->mot_de_passe;
    }

    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}