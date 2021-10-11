<?php $title = 'ChingYi P.C | Personal Blog | login'; ?>
<?php ob_start(); ?>
<!--background-->
<div style="background-image: url('/p5phpblog/public/img/sea.png');">
    <!--login-->
    <form class="ms-5 me-5 needs-validation">
        <h1 class="h3 p-4 fw-normal text-center cardtitle">Login</h1>

        <div class="form-floating ms-5 me-5 has-validation">
            <input type="email" class="form-control ps-5 pe-5 mb-3" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
            <div class="invalid-feedback">
                Please enter the correct username and password.
            </div>
        </div>
        <div class="form-floating ms-5 me-5 has-validation">
            <input type="password" class="form-control ps-5 pe-5 mb-3" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
                Please enter the correct username and password.
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
        <a href="index.php?action=signup">
            Signup?
        </a>

    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('src/views/frontend/_frontendLayout.php'); ?>