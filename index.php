<?php
session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    if(isset($_SESSION['user_id'])){
    ?>
    <h2><?php echo $_SESSION['user_id'] ?></h2>
    <h2><?php echo $_SESSION['user_name'] ?></h2>
    <a href="classes/logout.php">logout</a>
    <?php
    }
    else{
    ?>
    <h2>Signup</h2>
    <h2>Login</h2>
    <?php
    }
    ?>
    <br><br><br><br>
    <h1>SIGNUP:</h1>
    <form method="post" action="include/signup.inc.php">
    <table border="1px">
        <tr>
            <th>Username:</th>
            <td><input type="text" name="username"></td>
        </tr>
            <tr>
                <th>Email:</th>
                <td><input type="text" name="user_email"></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><input type="password" name="pwd"></td>
        </tr>
            <tr> 
            <th>Repeat pass:</th>
            <td><input type="password" name="repeatedPwd"></td>
        </tr>
    </table>
    <button type="submit" name="submit" value="submit">Signup</button>
    </form>
    <form method="post" action="include/login.inc.php">
    <h1>LOGIN:</h1>
    <table border="1px">
        <tr>
            <th>Username:</th>
            <td><input name="username"></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><input type="password" name="pwd"></td>
        </tr>
       
    </table>
    <button type="submit" name="submit" value="submit">Login</button>
    </form>


</body>
</html>