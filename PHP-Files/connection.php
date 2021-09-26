<?php

// $servername="localhost";
// $username="akshay";
// $password="Akshay@147852369";
// $dbname="oopscrud";

$servername="localhost";
$username="root";
$password="";
$dbname="oopscrud";

$conn= new mysqli($servername,$username,$password,$dbname);

if(!$conn)
{
    die("unable to connect: " . MySqli_connect_error());
}
?>