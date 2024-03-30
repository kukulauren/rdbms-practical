<?php


require_once "./db_connect.php";

$id = $_GET["row_id"];


$sql = "DELETE FROM modules WHERE id = $id ";


$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location:modules-create-list.php");
}
