<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    $name = $_POST["name"];
    $email = $_POST["email"];

    if(!isset($name))
    {
        die("Plese enter your name");
    }
    if(!isset($email))
    {
        die("Please enter your email address");
    }

    $mysqli = new mysqli($host,$username,$password,$database);

    if($mysqli->connect_error)
    {
        die('Error : ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    }

    $statement=$mysqli->prepare("insert into basic (name,email) values(?,?)");
    $statement->bind_param('ss',$name,$email);

    if($statement->execute())
    {
        print "Hello";      
    }
    else
    {
        print $mysqli->error;
    }
    
}



?>