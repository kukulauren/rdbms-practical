<?php


require_once "./db_connect.php";

$id = $_GET["row_id"];



// sql

$sql = "DELETE FROM enrollments WHERE id = $id ";


$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location:enroll-list.php");
}
