<?php 

$conn = mysqli_connect("localhost", "kmn", "hlaingminoo", "wad_school");

if (!$conn) {
    die(mysqli_connect_errno());
}