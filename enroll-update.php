<?php


require_once "./db_connect.php";

$id = $_POST["row_id"];
$batch_id = $_POST["batch_id"];

$sql = "UPDATE enrollments SET batch_id=$batch_id WHERE id = $id ";

// echo $sql;

$query = mysqli_query($conn,$sql);

if($query){
    header("Location:enroll-list.php");
}
