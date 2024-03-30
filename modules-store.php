<?php

require_once "./db_connect.php";



// print_r($_POST);

$name = $_POST["name"];
$course_id = $_POST["course_id"];


// SQL 

$sql = "INSERT INTO modules (name,course_id) 
VALUES ('$name',$course_id)";
// die($sql);


$query = mysqli_query($conn, $sql); // working stage

if ($query) {
    header("Location:modules-create-list.php");
}

// var_dump($query);

// echo $sql;