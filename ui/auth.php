
<?php
include_once '../dao/dbConnection.php';
global $db;
global $database;

$database = new dbConnection();
$db = $database -> openConn();

session_start();
if(isset($_POST["submit"])){
    //Register a user

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql= "insert into user (username, email, password, usertype) values ('$username','$email', '$password', 'A') ";
    $db->exec($sql);
    $database->closeConn();
}

if (isset($_POST["login"])){

    $lemail = $_POST['lemail'];
    $pass = $_POST['pass'];

    //TODO: login

   $sql1 = "select email, password from user where email = '$lemail' and  password = '$pass'";

   $user = $db -> query($sql1);
   $result = $user -> fetchAll();

   if(empty($result)){
        echo "not found";
   }

   else{
        echo "found";
   }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/light.css">
</head>
<body>
    <header>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">login|signup</a></li>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="classes.php">Classes</a></li>
            <li><a href="about.php">About us</a></li>
            </ul>
        </nav>
    </header>


    <h1>Create an account</h1>

    <form action="" method="POST">
        <lable for="email">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="checkbox" name="admin" value="admin">
        <input type="submit" name="submit">
    
    </form>

    <h1>Log in</h1>
    <form action="" method="POST">
    <input type="text" name="lemail" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login">
    </form>

    
    
</body>
</html>