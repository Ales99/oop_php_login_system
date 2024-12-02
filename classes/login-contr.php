<?php

class LoginContr extends Login{
    private $username;
    private $pwd;


    public function __construct($username,$pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->checkEmpty()==false){
             //echo "empty fields";
             header("Location: ../index.php?error=emptyfiedls");
             exit();        
        }
        $this->getUser($this->username,$this->pwd);
    }



    private function checkEmpty(){
        $result=null;
        if(empty($this->username) || empty($this->pwd)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    }