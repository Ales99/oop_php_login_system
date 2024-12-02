<?php
if(isset($_POST['submit'])){
    extract($_POST);

    include"../classes/dbh.php";
    include"../classes/signup.classes.php";
    include"../classes/signup-contr.php";
    

    //initiate the process
    $signup = new SignupContr($username,$user_email,$pwd,$repeatedPwd);
    $signup->signupUser();

    header("Location: ../index.php");
}
