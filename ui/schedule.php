<?php
require_once "../dao/dbConnection.php";


$database = new dbConnection();
$db = $database -> openConn();

$sql ="select * from schedule";
$row = $db->query($sql) -> fetchAll(PDO::FETCH_ASSOC);


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
            <li><a href="#">Home</a></li>
            <li><a href="auth.php">login|signup</a></li>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="schedule.php">Schedule</a></li>

            <li><a href="classes.php">Classes</a></li>
            <li><a href="about.php">About us</a></li>
            </ul>
        </nav>
    </header>


<table>
<tr>
    <th>activity</th>
    <th>date</th>
    <th>time</th>
    
 </tr>
 <tr>
 <?php
 foreach($row as $r){
    echo "<tr>".
    "<td>".$r['activity']."</td>".
    "<td>".$r['date']."</td>".
    "<td>".$r['time']."</td>".
 "</tr>";
 }
 ?>

</table>