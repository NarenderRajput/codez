<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

define('BASE_URL', 'http://localhost/codez');
define('ROOT', 'codez');

include 'autoloader.php';
include 'src/helpers/common.php';

use src\routes\Route;

Route::init();