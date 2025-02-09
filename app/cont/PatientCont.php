<?php

require_once __DIR__.'/../mod/patient.php';
class PatientCont {
    public function index(){
        $patient = new Patient();
        
        $stmt = $patient->getAllMedcin();
        require_once(__DIR__ . '/../view/patient/home.php');
    }
    public function  delete(){
        echo  'delete patient';
    }
    public function  create($id){
        $patient = new Patient();
        $patient->createRendezVous($id);
        header("Location: index");
    }
}