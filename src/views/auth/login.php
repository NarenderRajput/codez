<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $theme_assets = 'assets/theme/';
    include "src/views/auth/layouts/header.php";
    ?>
</head>

<body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-body-secondary">Sign In to your account</p>
                                <form class="mt-5 m-3" action="<?php echo "admin/login" ?>" method="POST">
                                <?php 
                                if (isset($_SESSION["loginErr"])) { ?>
                                <p class="text-danger"><?php echo $_SESSION["loginErr"]; ?> </p>    
                                <?php } ?>
                                <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span>
                                        <input class="form-control" name="email" type="text" placeholder="Username"><br>
                                        <?php
                                        if (isset($_SESSION['emailErr'])) { ?>
                                            <p class="text_danger"> <?php echo $_SESSION['emailErr']; ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span>
                                        <input class="form-control" name="password" type="password" placeholder="Password"><br>
                                        <?php
                                        if (isset($_SESSION['passwordErr'])) { ?>
                                            <p class="text-danger"> <?php echo $_SESSION['passwordErr']; ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <a href="register.php"><button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button></a>
                                </div>
                            </div>
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