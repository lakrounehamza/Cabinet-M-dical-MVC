<?php

namespace app\models;

use config\Database;
use PDO;
use DateTime;
class User
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $role;
    protected $date_creation;

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
    public function  setDate_creation()
    {
        $date = new DateTime(); 
        $this->date_creation = $date->format('Y-m-d'); 
    }
    public function  setPassword($password)
    {
        if (strlen($password) >= 8)
            $this->password = $password;
    }
    public function  getId()
    {
        return $this->id;
    }
    public function  getNom()
    {
        return $this->nom;
    }
    public function  getPrenom()
    {
        return $this->prenom;
    }
    public function  getEmail()
    {
        return $this->email;
    }
    public function  getPassword()
    {
        return  $this->password;
    }
    public function  getRole()
    {
        return  $this->role;
    }
    public function  getDate_creation()
    {
        return $this->date_creation;
    }
    public function  getUserByEmail()
    {
        $email =  $this->getEmail();
        $instance = Database::getInstance();
        $stmt  =   $instance->prepare("select  *  from  user  where email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    public function  getAllUsers()
    {
        $instance =  Database::getInstance();
        $stmt = $instance->prepare("select *  from   user");
        $stmt->execute();
        return $stmt;
    }
    public function  deleteUserById(): void
    {
        $id =  $this->getId();
        $instance = Database::getInstance();
        $stmt = $instance->prepare("delete  from  user where id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function  editeUserById($user)
    {
        if ($user instanceof User) {
            $nom        =  $user->getNom();
            $prenom     =  $user->getPrenom();
            $password   =  $user->getPassword();
            $instance   =  Database::getInstance();
            $stmt = $instance->prepare("update  user set  nom = :nom , prenom = :prenom  , password = :password");
            $stmt->bindParam(":nom", $nom , PDO::PARAM_STR);
            $stmt->bindParam(":prenom", $prenom , PDO::PARAM_STR);
            $stmt->bindParam(":password", $password , PDO::PARAM_STR);
            $stmt->execute();
        }
    }
    public function  createUser()
    {
        $this->setDate_creation();
        $nom              =  $this->getNom();
        $prenom           =  $this->getPrenom();
        $password         =  $this->getPassword();
        $email            =  $this->getEmail();
        $role             =  $this->getRole();
        $date_creation    =  $this->getDate_creation();
        $password = password_hash($password,PASSWORD_DEFAULT);
        $stmt =  $this->getUserByEmail();
        if (!$row  =  $stmt->fetch(PDO::FETCH_ASSOC)){
            $instance =  Database::getInstance();
            $stmt  =  $instance->prepare("insert  into  user (prenom , nom , email , passwword ,role ,date_creation)
                                          values (:prenom , :nom , :email , :passwword , :role ,:date_creation)   ");
            $stmt->bindParam(":prenom", $prenom ,PDO::PARAM_STR);
            $stmt->bindParam(":nom", $nom ,PDO::PARAM_STR);
            $stmt->bindParam(":email", $email ,PDO::PARAM_STR);
            $stmt->bindParam(":password", $password ,PDO::PARAM_STR);
            $stmt->bindParam(":role", $role ,PDO::PARAM_INT);
            $stmt->bindParam(":date_creation", $date_creation ,PDO::PARAM_STR);
            $stmt->execute();
        } 
    }
    public function  login()
    {
        $instance = Database::getInstance();
        $email = $this->getemail();
        $password = $this->getPassword();
        $stmt =  $this->getUserByEmail();
        if($row  = $stmt->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($password , $row['password'])){
                echo 'hello';
            }
        }
    }
}

?>
