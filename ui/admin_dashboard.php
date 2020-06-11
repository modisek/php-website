<?php

require_once "../dao/dbConnection.php";
require_once '../models/News.php';
require_once '../models/_Class.php';

$database = new dbConnection();
$db = $database->openConn();
$class = new _Class($db);
$news = new News($db);

$date = date('Y-m-d H:i:s');

//add news item

function add_class($class_name, $class_time, $class_desc)
{

    global $db;
    global $class;

    // $class->id = $id;
    $class->class_name = $class_name;
    $class->class_time = $class_time;
    $class->class_desc = $class_desc;
    $class->create();

}

function add_news($heading, $content)
{

    global $news;
    $news->heading = $heading;
    $news->content = $content;
    $news->createdAt = date('Y-m-d H:i:s');
    $news->create();

}

//TODO1:edit news
function edit_news($content)
{
    $sql = "UPDATE news SET content = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$content, $id]);
}

//TODO2:delete news
function delete_news($id)
{
    $sql->prepare("DELETE FROM news WHERE id = ?");
    $sql->execute([$id]);
    $deleted = $sql->rowCount();
}

function view_classes()
{

    global $db;
    $classes_query = "select * from classes";
    $results = $db->query($classes_query)->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>All the users who have booked for a class</h3>";
    echo " <table>
    <tr>
        <th>username</th>
        <th>class</th>
        <th>time</th>
        <th>edit</th>
        <th>delete</th>

     </tr>
     <tr>";

    foreach ($results as $result) {
        echo "<tr>" .
            "<td>" . $result['class_desc'] . "</td>" .
            "<td>" . $result['class_name'] . "</td>" .
            "<td>" . $result['class_time'] . "</td>" .
            "<td>" . "<button type=" . "button" . ">edit</button>" . "</td>" .
            "<td>" . "<button type=" . "button" . ">delete</button>" . "</td>" .
            "</tr>";

        //TODO:when admin presses approve send email to email on db

    }

    echo "</table>";
}

function view_bookings()
{

    //TODO:needs a bit of work
    //DONE:idea is to join bookings and user to determine whic user booked for a class
    global $db;

    //view bookings
    $bookings_sql = "select userid,username,class_name, class_time from booked, user, classes  WHERE booked.class_id = user.id and classes.id = booked.class_id";
    $results = $db->query($bookings_sql)->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>All the users who have booked for a class</h3>";
    echo " <table>
    <tr>
        <th>username</th>
        <th>class</th>
        <th>time</th>
        <th>approve</th>

     </tr>
     <tr>";
    foreach ($results as $result) {
        echo "<tr>" .
            "<td>" . $result['username'] . "</td>" .
            "<td>" . $result['class_name'] . "</td>" .
            "<td>" . $result['class_time'] . "</td>" .
            "<td>" . "<button name=" . "approve_btn" . " " . ">approve</button>" . "</td>" .

            "</tr>";

        //TODO:when admin presses approve send email to email on db

    }

    echo "</table>";

}

view_classes();
//add_class(5, "cricket", "02:00", "male's under 23 cricket");
view_bookings();

if (isset($_POST["classes_btn"])) {

    if ($_POST['class_name_edit'] != null) {
        add_class($_POST['class_name_edit'], $date, $_POST['class_desc_edit']);

        echo "create at " . DATE(1);

    }
}
//add  news
if (isset($_POST["news_btn"]) != null) {
    add_news($_POST["news_heading"], $_POST["news_content"]);
}

//when approved is clicked do something

if (isset($_POST['approve_btn'])) {
    echo "approved clicked";

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
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
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



<h3>ADD A CLASS</h3>
<form action=""  method="POST">

    <input type="text" name="class_name_edit" placeholder="class name">

    <input type="text" name="class_desc_edit" placeholder="class description">

    <input type="submit" name="classes_btn" value="add class">

</form>
<h3>ADD news Item</h3>
<form action=""  method="POST">

    <input type="text" name="news_heading" placeholder="heading">

    <input type="text" name="news_content" placeholder="content">

    <input type="submit" name="news_btn" value="add news ">

</form>
