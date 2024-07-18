<?php
include "../../Config/database.php";

$sql = "CREATE TABLE users(
    id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(191),
    email VARCHAR(191) NOT NULL,
    password VARCHAR(20) NOT NULL,
    role ENUM('admin', 'writer'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if(mysqli_query($conn, $sql)) {
    echo "Create users table successfully".PHP_EOL;
} else {
    echo "Error creating users table" . mysqli_error($conn).PHP_EOL;
}

mysqli_close($conn);

?>