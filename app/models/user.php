<?php
class User
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role;
    private $date_creation;

    public function  __construct() {}

    public function setId($id)
    {
        if (is_int($id) && $id > 0)
            $this->id = $id;
    }
    public function  setNom($nom)
    {
        if (preg_match('/^[a-zA-Z\s]{3,50}$/', $nom))
            $this->nom = $nom;
    }
    public function  setPrenom($prenom)
    {
        if (preg_match('/^[a-zA-Z\s]{3,50}$/', $prenom))
            $this->prenom = $prenom;
    }
    public function  setEmail($email)
    {
        if (preg_match('/^[a-zA-Z0-9]{4,50}@gmail.com$/', $email))
            $this->email = $email;
    }
    public function  setDate_creation($date){
        $this->date_creation = $date;
    }
    public function  setPassword($password)
    {
        if (strlen($password) >= 8)
            $this->password = $password;
    }
    public function  getId(){
        return $this->id;
    }
    public function  getNom(){
        return $this->nom;
    }
    public function  getPrenom(){
        return $this->prenom;
    }
    public function  getEmail(){
        return $this->email;
    }
    public function  getPassword(){
        return  $this->password ;
    }
    public function  getRole(){
        return  $this->role;
    }
    public function  getDate_creation(){
        return $this->date_creation;
    }
}
