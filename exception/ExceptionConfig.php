<?php
class ExceptionConfig extends PDOException{
    public function  __construct($message){
        parent::__construct($message);
    }
}