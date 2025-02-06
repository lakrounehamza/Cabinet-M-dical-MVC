<?php 
namespace config;
use exeption\ExceptionConfig ;
use PDO;
class  Database {
    private  ?Database  $instance= null;
    private ?PDO $connect; 
    public function   __construct(){
        try{
            $con =  new  PDO("pgsql:host=localhost;port=5432;dbname=cabinetMvc", "postgres", "lakroune");

            if(!$con){
                throw new ExceptionConfig ("erreur de configuration");
            }
            $connect = $con;
        }catch(ExceptionConfig   $e){
            $mess = 'erreur : ' . $e->getMessage();
            die($mess);
        }
    }
    public function  getConnect(){
        return $this->connect;
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->getConnect(); 
    }
}
?>