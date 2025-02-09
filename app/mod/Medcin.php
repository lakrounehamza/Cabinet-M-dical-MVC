<?php 

session_start();
require_once(__DIR__ . '/User.php');
class Medcin  extends User{
    public function  getAllPatient(){
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $id =  $this->getId();
        $stmt =  $connect->prepare("select  u.*  ,r.statut ,r.date_craeted  from \"user\" u join rendezvous r on u.id =r.id_patient    where r.id_medcin = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt ;
        
    }
    public function  getAllRoundezVous(){
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $id =  $this->getId();
        $stmt =  $connect->prepare("select *  from  rendezvous  where id_medcin = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt ;
    }
    public function  getAllRoundezVousEncore(){
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $id =  $this->getId();
        $stmt =  $connect->prepare("select *  from  rendezvous  where id_medcin = :id and  statut = 'encore");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt ;
    }
    public function acsupteRendezVous($rondezvous){
        $idMedcin = $this->getId();
        $idRendezvous = $rondezvous->getId();
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $stmt =  $connect->prepare("update rendezvous  set  statut  =  'acsupte' where id_medcin = :idMedcin and id =:idRendezvous");
        $stmt->bindParam(":idMedcin",$idMedcin,PDO::PARAM_INT);
        $stmt->bindParam(":idRendezvous",$idRendezvous,PDO::PARAM_INT);
        $stmt->execute();
    }
    public function annuleRendezVous($rondezvous){
        $idMedcin = $this->getId();
        $idRendezvous = $rondezvous->getId();
        $instance = Database::getInstance();
        $connect  =  $instance->getConnect();
        $stmt =  $connect->prepare("update rendezvous  set  statut  =  'annule' where id_medcin = :idMedcin and id =:idRendezvous");
        $stmt->bindParam(":idMedcin",$idMedcin,PDO::PARAM_INT);
        $stmt->bindParam(":idRendezvous",$idRendezvous,PDO::PARAM_INT);
        $stmt->execute();
    }
}