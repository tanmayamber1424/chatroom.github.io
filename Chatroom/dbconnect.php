<?php

$servername = "localhost";
$username ="root";
$password ="";
$database = "Chattroom";



$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("failed To Connect". mysqli_connect_error());
}

?>