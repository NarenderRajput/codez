<?php

namespace src\controllers;

use src\http\Request;

class LoginController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $data = '';

        if (empty($request->email)) {
            $_SESSION["emailErr"] = "Email is Required";
        } else {
            $email = $this->cleanInput($request->email);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["emailErr"] = "Invalid email Format";
            } else {
                $data .= "'$email',";
            }
        }

        if (empty($request->password)) {
            $_SESSION["passwordErr"] = "Password is Required";
        } else {
            $password = $this->cleanInput($request->password);
            $data .= "'" . password_hash($password, PASSWORD_BCRYPT) . "'";
        }

        if (isset($_SESSION['emailErr']) && isset($_SESSION['passwordErr'])) {
            return header("location: /codez/admin", true, 302);
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        dd($rows);

        $stmt->close();
    }

    public function cleanInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
