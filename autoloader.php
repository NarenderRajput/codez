<?php

if (false === defined('BASE_URL')) { echo "Invalid Access!";exit; }

// Define the autoloader function
function myAutoloader($className) {
    // Define the directory where your class files are located
    $directory = __DIR__ . '/'; // Adjust the path as necessary

    // Construct the full path to the class file
    $file = $directory . str_replace('\\', '/', $className) . '.php';
    
    // Check if the file exists and include it
    if (file_exists($file)) {
        require_once $file;
    }
}

// Register the autoloader function
spl_autoload_register('myAutoloader');
