<?php

require_once "./db_connect.php";



// print_r($_POST);
// die();

$nation = $_POST["nation"];
$nation_code = $_POST["nation_code"];
$fee = $_POST["fee"];

// SQL 

$sql = "INSERT INTO nationality (nation,nation_code) VALUES ('$nation','$nation_code')";

$query = mysqli_query($conn,$sql); 

if($query){
    header("Location:nationality-create-list.php");
}

// var_dump($query);

// echo $sql;
