<?php
require_once "../dao/dbConnection.php";

$database = new dbConnection();
$db = $database->openConn();

$sql = "select * from classes";
$row = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/light.css">
</head>
</head>
<body>
    <header>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">something</a></li>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="#">Classes</a></li>
            <li><a href="about.php">About us</a></li>
            </ul>
        </nav>
    </header>

<h1>Book a class</h1>

<table>
<tr>
    <th>class</th>
    <th>time</th>
    <th>book</th>

 </tr>
 <tr>
 <?php
foreach ($row as $r) {
    echo "<tr>" .
        "<td>" . $r['class_name'] . "</td>" .
        "<td>" . $r['class_time'] . "</td>" .
        "<td>" . "<button type=" . "button" . ">book</button>" . "</td>" .
        "</tr>";
}
?>

</table>

<input type="time" range="2">

    <footer>
    </footer>

</body>
</html>