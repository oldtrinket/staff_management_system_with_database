<?php
if ( isset($_GET['staffID']) ) {
    $staffID = $_GET['staffID'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fastfood";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM staff WHERE staffID = $staffID";
    $connection->query($sql);
    
}

header("Location: /henry_ff/index3.php");
e;
?>
