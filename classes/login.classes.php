<?php
class Login extends Dbh{

    protected function getUser($username,$pwd){
        $stmt = $this->connect()->prepare('SELECT `password` FROM `users` WHERE name = ? OR email = ?;');

        if(!$stmt->execute(array($username,$username))){
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt=null;
            header("Location: ../index.php?error=Usernotfouns");
            exit();
        }
        $hashedPass = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkResult = password_verify($pwd,$hashedPass['password']);
        if($checkResult == false){
            $stmt = null;
            header("Location: ../index.php?error=wrongPass");
            exit();
        }
        elseif($checkResult == true){
            $stmt = $this->connect()->prepare('SELECT * FROM `users` WHERE name = ? OR email = ?;AND password = ?');
            if(!$stmt->execute(array($username,$username,$pwd))){
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                header("Location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
        }
        $stmt = null;
        }

}