<?php

require_once "./db_connect.php";
$student_id=$_POST['student_id'];
$batch_id=$_POST['batch_id'];
$sql = "INSERT INTO enrollments (student_id,batch_id) VALUES ($student_id,$batch_id)";

$query = mysqli_query($conn,$sql); 

if($query){
    header("Location:enroll-list.php");
}