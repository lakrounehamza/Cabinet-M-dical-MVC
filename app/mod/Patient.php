<?php
require_once(__DIR__ . '/User.php');
require_once(__DIR__ . '/RendezVous.php');

session_start();
class Patient extends User {
    public function getAllMedcin(){
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $stmt =  $connect->prepare("select  *  from \"user\"  where role = 1");
        $stmt->execute();
        return $stmt ;
    }
    public function  getMesRendezVous(){
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $id = $this->getId();
        $stmt =  $connect->prepare("select  r.* ,u.nom ,u.prenom  from \"user\" u join rendezvous r on r.id_medcin = u.id  where  r.id_patient= :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt ;
    }
    public function  editeRendezvous($id , $rendezvous) {
        // $instance = Database::getInstance();
        // $connect  =  $instance->getConnect();
        // $id = $this->getId();
        // $stmt =  $connect->prepare("update rendezvous set ");
        // $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        // $stmt->execute();
    }
    public function  createRendezVous($idMedcin){
        $id =  $this->getId();
        
        $date = new DateTime();
        $date_creation = $date->format('Y-m-d');

        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $stmt =  $connect->prepare("insert into \"user\"  (statut , id_patient , id_medcin ,date_craeted) values ('encore' , :id_patient , :id_medcin ,:date_craeted)");
        $stmt->bindParam(":id_patient",$id,PDO::PARAM_INT);
        $stmt->bindParam(":id_medcin",$id,PDO::PARAM_INT);
        $stmt->bindParam(":date_creation",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}