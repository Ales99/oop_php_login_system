<?php
class Signup extends Dbh{

    protected function setUser($username,$email,$pwd){
        $stmt = $this->connect()->prepare('INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?);');
        $pwdHashed = password_hash($pwd,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($username,$email,$pwdHashed))){
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        };
        $stmt = null;
    }

    protected function checkuser($username,$email){
        $stmt = $this->connect()->prepare('SELECT `id`FROM `users` WHERE name = ? OR email = ? ;');

        if(!$stmt->execute(array($username,$email))){
            $stmt = null;
            header('Location: ../index.php?error=stmtfailed');
            exit();
        }
        $checkresult=null;
        if($stmt->rowCount() > 0){
            return $checkresult = false;
        }
        else{
            return $checkresult = true;
        }
    }
}