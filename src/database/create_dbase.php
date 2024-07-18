<?php

include "../../Config/database.php";

$sql = "CREATE DATABASE dbase";

if(mysqli_query($conn, $sql)) {
    echo "Create database successufully";
} else {
    echo "Error creating database" . mysqli_error($conn);
}

mysqli_close($conn);
?>