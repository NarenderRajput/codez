<?php

include "../../Config/app.php";
include "../../Config/common.php";


session_destroy();

header("location: ../views/auth/login.php");


?>