<?php

class SignupContr extends Signup{
    private $username;
    private $email;
    private $pwd;
    private $repeatedPwd;

    public function __construct($username,$email,$pwd,$repeatedPwd)
    {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->repeatedPwd = $repeatedPwd;      
    }

    public function signupUser(){
        if($this->checkEmpty() == false){
            //echo "empty fields";
            header("Location: ../index.php?error=emptyfiedls");
            exit();        
        }

        if($this->checkUsername() == false){
            //echo "special characters found";
            header("Location: ../index.php?error=specialcharacterfound");
            exit();        
        }

        if($this->checkEmail() == false){
            //echo "invalid email";
            header("Location: ../index.php?error=invalidemail");
            exit();        
        }

        if($this->checkPass() == false){
            //echo "passwords dont match";
            header("Location: ../index.php?error=passwordsdontmatch");
            exit();        
        }

        if($this->checkuservalid() == false){
            //echo "username already exists";
            header("Location: ../index.php?error=usernamealreadyexitsts");
            exit();        
        }

        $this->setUser($this->username,$this->email,$this->pwd);
    }

    private function checkEmpty(){
        $result=null;
        if(empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->repeatedPwd )){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function checkUsername(){
        $result = null;
        if(preg_match('/[^a-zA-Z0-9]/',$this->username)){
            return $result = false;
        }
        else{
            return $result = true;
        }
    }

    private function checkEmail(){
        $result = null;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return $result = false;
        }
        else{
            return $result = true;
        }
    }

    private function checkPass(){
            $result = null;
            if($this->pwd !== $this->repeatedPwd){
                return $result = false;
            }
            else{
                return $result = true;
            }
        }

     private function checkuservalid(){
            $result = null;
            if(!$this->checkuser($this->username,$this->email)){
                return $result = false;
            }
            else{
                return $result = true;
            }
        }

    }