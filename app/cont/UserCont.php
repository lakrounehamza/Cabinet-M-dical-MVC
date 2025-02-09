<?php
require_once __DIR__.'/../mod/User.php';
class UserCont{
    public function  index($par =[]){
        echo "user Cont ";
        $user = new User();
        // foreach($par as $val){
        //     echo $val;
        // }

    }
    public function  delete(){
        echo  " contre delete";
    }
}