<?php

$obj1 = new User("","","","");
$obj1 -> username = "axel";
//TODO:
echo $obj1->username;

$admin = new admin();
$admin-> username = "abel";
echo $admin->username;

class User{

    public $username, $email, $password, $isAdmin;

    function __construct($username, $email, $password, $isAdmin){
    $this->$username = $username;
    $this->$email = $email;
    $this->$password = $password;
    $this->$isAdmin = $isAdmin;

    }
}

class admin extends User{

}


?>