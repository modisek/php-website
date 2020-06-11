<?php

require_once "_Class.php";
require_once "../dao/dbConnection.php";

$database = new dbConnection();
$db = $database->openConn();

$class = new _Class($db);
$class->id = 2;
$class->class_name = "chess";
$class->class_time = "3:00";
$class->class_desc = "class desc";

$class->create();


