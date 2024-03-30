<?php

require_once "./db_connect.php";
$type = $_POST["type"];

// SQL 

$sql = "INSERT INTO gender (type) VALUES ('$type')";

$query = mysqli_query($conn,$sql); 

if($query){
    header("Location:gender-create-list.php");
}
