<?php
include "../../Config/app.php";
include "../../Config/common.php";
include "../../Config/database.php";



$name =  $data = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $_SESSION["nameErr"] = "Name is Required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $_SESSION["nameErr"]  = "Only letters and white space allowed";
    } else {
      $data .= "'$name',";
    }
  }



  if (empty($_POST["email"])) {
    $_SESSION["emailErr"] = "Email id Is Required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION["emailErr"] = "Invalid Email format";
    } else {
      $data .= "'$email',";
    }
  }

  if (empty($_POST["password"])) {
    $_SESSION["passwordErr"] = "Password is Required ";
  } else {
    $password = password_hash(test_input($_POST["password"]), PASSWORD_BCRYPT);
    $data .= "'$password',";
  }
 
  if (isset($_SESSION["nameErr"]) || isset($_SESSION["emailErr"]) || isset($_SESSION["passwordErr"])) {
    header('location: ../src/views/auth/register.php');
  } else {
    if (check_email($conn, $email)) {
      mysqli_close($conn);
      $_SESSION["emailErr"] = "Email already exist";
      header('location: ../views/auth/register.php');
      exit;
    } else {
      insert_data($conn, $data);
    }
  }
}


function test_input($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function insert_data($conn, $data)
{
  $data .= "'writer'";
  $sql = "INSERT INTO users(username, email, password, role)
  VALUES($data)";

  if (Mysqli_query($conn, $sql)) {
    header("location: ../views/auth/login.php");
  } else {
    $_SESSION["regErr"] = "failed to register";
    header("location: ../views/auth/register.php");
  }

  mysqli_close($conn);
}

function check_email($conn, $email)
{
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    return TRUE;
  }
  return FALSE;
}
