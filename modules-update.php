<?php


require_once "./db_connect.php";



// print_r($_POST);
// die();

$name = $_POST["name"];
$id = $_POST["row_id"];
$course_id = $_POST["course_id"];

$sql = "UPDATE modules SET name='$name',course_id=$course_id WHERE id = $id ";

// echo $sql;

$query = mysqli_query($conn,$sql);

if($query){
    header("Location:modules-create-list.php");
}
