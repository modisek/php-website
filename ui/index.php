<?php
include_once '../dao/dbConnection.php';
#connect to db
$database = new dbConnection();
$db = $database->openConn();

$sql = "select content from news";
$res = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

#query table
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

<?php
echo '<h3>news</h3>';

foreach ($res as $r) {
    echo "{$r['content']} <br>";
}

?>

<div class="container">
  <h1>Countdown to my start of games:</h1>
  <ul>
    <li><span id="days"></span>days</li>
    <li><span id="hours"></span>Hours</li>
    <li><span id="minutes"></span>Minutes</li>
    <li><span id="seconds"></span>Seconds</li>
  </ul>
</div>
  <script  src="../scripts/script.js"></script>

    <footer>
    </footer>

</body>
</html>