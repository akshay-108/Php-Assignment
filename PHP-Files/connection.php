<?php

$servername="localhost";
$username="akshay";
$password="Akshay@147852369";
$dbname="oopscrud";

$conn= new mysqli($servername,$username,$password,$dbname);

if(!$conn)
{
    die("unable to connect: " . MySqli_connect_error());
}
?>