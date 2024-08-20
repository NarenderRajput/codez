<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">

<head>
    <?php
    include 'config/app.php';
    $theme_assets = 'assets/theme/';
    $errors = $_SESSION;
    session_destroy();
    include "src/views/auth/layouts/header.php";
    ?>
</head>

<body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">

                            <h1>Register</h1>
                            <p class="text-body-secondary">Create your account</p>
                            <form class="mt-5 m-3" action="../../controller/RegisterController.php" method="POST">
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                                        </svg></span>
                                    <input class="form-control" name="name" type="text" placeholder="Username"><br>
                                    <?php
                                    if (isset($errors['nameErr'])) { ?>
                                        <p class="text-danger"><?php echo $errors['nameErr'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                        </svg></span>
                                    <input class="form-control" name="email" type="text" placeholder="Email"><br>
                                    <?php
                                    if (isset($errors['emailErr'])) { ?>
                                        <p class="text-danger"><?php echo $errors['emailErr'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" name="password" type="password" placeholder="Password"><br>
                                    <?php
                                    if (isset($errors['passwordErr'])) { ?>
                                        <p class="text-danger"><?php echo $errors['passwordErr'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" name="password" type="password" placeholder="Repeat password"><br>
                                    <?php
                                    if (isset($errors['passwordErr'])) { ?>
                                        <p class="text-danger"><?php echo $errors['passwordErr'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-block btn-success" type="submit">Create Account</button>
                                    <a href="login.php">
                                        <p>Already have an account</p>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <?php
    include "src/views/auth/layouts/footer.php";
    ?>

</body>

</html>