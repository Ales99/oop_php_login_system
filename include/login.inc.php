<?php

if(isset($_POST['submit'])){
    extract($_POST);
    include "../classes/dbh.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.php";

    $login = new LoginContr($username,$pwd);

    $login->loginUser();
    header("Location: ../index.php");
}