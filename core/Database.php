<?php 
namespace  core ; 
use PDO;
use PDOException;
class  Database {
    private  static ?Database  $instance= null;
    private ?PDO $connect; 
    public function   __construct(){
        try{
            $con =  new  PDO("pgsql:host=localhost;port=5432;dbname=cabinetmvc", "postgres", "lakroune");

            if(!$con){
                throw new PDOException();
            }
            $this->connect = $con;
        }catch(PDOException   $e){
            $mess = 'erreur de configuration : ' . $e->getMessage();
            die($mess);
        }
    }
    public function  __destruct(){
        $this->connect = null;
    }
    public function  getConnect(){
        return $this->connect;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance->getConnect();
    }
}
?>