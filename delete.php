<?php

include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM songs WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    header('location: index.php');
} else {
    echo "There's something wrong with your database or query.";
}

mysqli_close($conn);