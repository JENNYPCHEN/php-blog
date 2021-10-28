<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog | Reset Password'; ?>
<?php ob_start(); ?>
<!--background-->
<div style="background-image: url('public/img/sea.png');">
    <!--reset password-->
    <form class="ms-5 me-5 needs-validation" action="index.php?action=newPassword" method="post" rel="noopener noreferrer">
        <h1 class="h3 p-4 fw-normal text-center cardtitle">Reset Password</h1>
        <p class="error"><?php echo $error ?></p>
        <div class="form-floating ms-5 me-5 has-validation">
            <input type="hidden" name="email" value="<?= $_GET['email'] ?>">
            <input type="hidden" name="reset_token" value="<?= $_GET['reset_token'] ?>">
            <input type="password" class="form-control ps-5 pe-5 mb-3" id="floatingInput" name="password" required>
            <label for="floatingInput">Please enter new password:</label>
        </div>
        <div class="form-floating ms-5 me-5 has-validation">
            <input type="password" class="form-control ps-5 pe-5 mb-3" id="floatingPassword" name="confirmPassword" required>
            <label for="floatingPassword">Re-enter new password:</label>
            <button class="w-100 btn button ps-5 pe-5 mb-3 " type="submit">Reset Password</button>
        </div>
    </form>
    <?php $content = ob_get_clean(); ?>

    <?php require('src/views/frontend/_frontendLayout.php'); ?>