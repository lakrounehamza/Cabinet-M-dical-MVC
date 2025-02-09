<?php 
class MedcinCont{
    public function index($par= ' '){
        echo $par;
        
        require_once(__DIR__ . '/../view/medcin/home.php');

    }
}