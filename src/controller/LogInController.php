<?php
include "../../Config/app.php";
include "../../Config/common.php";
include "../../Config/database.php";

$email = $password = $data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $_SESSION["emailErr"] = "Email is Required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email Format";
        } else {
            $data .= "'$email',";
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION["passwordErr"] = "Password is Required";
    } else {
        $password = test_input($_POST["password"]);
        $data .= "'$password'";
    }

    if (isset($_SESSION['emailErr']) && isset($_SESSION['passwordErr'])) {
        header('location: ../views/auth/login.php');
    } else {
    
        if (empty($emailErr) && empty($passwordErr)) {
        check_data($email, $password, $conn);
        }
    }


}


function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  function check_data($email, $password, $conn) {
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['users'] = $row;
        }
        header('location: ../views/dashboard.php');  
        exit;     
    } 
    mysqli_close($conn);
    $_SESSION["loginErr"] = "invalid credential";
    header("location: ../views/auth/login.php");
}


?>