<?php

namespace app\models;
use DateTime ;
use config\Database ;
use PDO;
class RendezVous
{
    private  ?int     $id;
    private  ?String  $statut;
    private  ?String  $date_creation;
    private  ?String  $date_rendez_vous ;
    public function  __construct(){
    }
    public function  setId($id){
        if(is_int($id)  &&  $id>0)
            $this->id = $id;
    }
    public function  setStatut($statut){
        if($statut = 'acsupte' || $statut = 'annule'){
            $this->statut = $statut ;
        }
    }
    public function  setDate_creation()
    {
        $date = new DateTime(); 
        $this->date_creation = $date->format('Y-m-d'); 
    }
    public function  setDate_rendez_vous($date){
        $this->date_rendez_vous = $date;
    }
    public function getId(){
        return  $this->id;
    }
    public function  getStatut(){
        return  $this->statut;
    }
    public function  getDate_creation(){
        return  $this->date_creation;
    }
    public function getDate_rendez_vous(){
        return  $this->date_rendez_vous;
    }
    public function  getRendezVousById(){
        $id =   $this->getId();
        $connect  =  Database::getInstance();
        $stmt     =  $connect->prepare("select * from  rendezvous where id = :id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt();
    }
    public function  getAllRendezVous(){
        $connect  =  Database::getInstance();
        $stmt  =  $connect->prepare("select * from rendezvous ");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt();
    }

}
