<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog | login'; ?>
<?php ob_start(); ?>
<!--background-->
<div style="background-image: url('public/img/sea.png');">
    <!--login-->
    <?php if (isset($_SESSION['successmessage']) && !empty($_SESSION['successmessage'])) { ?>
                    <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?php echo $_SESSION['successmessage']; ?></div>
                <?php
                    unset($_SESSION['successmessage']);
                }
                ?>
    <form class="ms-5 me-5 needs-validation" action="index.php?action=login" method="post" target="_blank" rel="noopener noreferrer">
        <h1 class="h3 p-4 fw-normal text-center cardtitle">Login</h1>

        <div class="form-floating ms-5 me-5 has-validation">
            <input type="text" class="form-control ps-5 pe-5 mb-3" id="floatingInput" placeholder="username" name="username" required>
            <label for="floatingInput">Username</label>
            <div class="error">
            <?php echo $error ?><!--Please enter the correct username and password.-->
            </div>
        </div>
        <div class="form-floating ms-5 me-5 has-validation">
            <input type="password" class="form-control ps-5 pe-5 mb-3" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
            <div class="error">
            <?php echo $error ?><!--Please enter the correct username and password.-->
            </div>
            <button class="w-100 btn button ps-5 pe-5 mb-3 " type="submit">Sign in</button>
        </div>
    </form>

    <!--dropdown1-->
    <div class="dropdown text-center">
        <a class="btn fs-6 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Forgot your password?
        </a>
        <form class="dropdown-menu p-4 ">
            <div class="mb-3 blogtext">
                <p>Please enter your username or email address. <br>Instructions for resetting the password will be immediately emailed to you.</p>
                <input type="email" class="form-control" id="emailAddress" placeholder="email@example.com">
            </div>
            <button type="submit" class="btn button">Reset Password</button>
        </form>
    </div>
    <!--dropdown2-->
    <div class="dropdown text-center link2">
        <a href="index.php?action=signuppage">
            Signup?
        </a>

    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('src/views/frontend/_frontendLayout.php'); ?>