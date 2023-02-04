<?php
$databasename = "localhost";
$servername = "root";
$password = "";
$database = "oilwebbase";

$conn = mysqli_connect($databasename,$servername,$password,$database);
if(!$conn)
{
    die ("error" . mysqli_connect_error());
}



?>