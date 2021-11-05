<?php $title = 'ChingYi P.C | Personal Blog | sign up'; ?>
<?php ob_start(); ?>
<!--background-->
<div style="background-image: url('public/img/sea.png');">
<!--signup-->
<div class="container-fluid">

  <form class="ms-5 me-5 needs-validation" id="signup-form" action="index.php?action=signup" method="post">
    <h1 class="h3 p-4 fw-normal text-center cardtitle">Sign up</h1>
    <div class="error"><?= filter_var($error, FILTER_SANITIZE_STRING);?></div>
    <div class="row">
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" name="firstName" placeholder="First name" value="<?=filter_var($firstName, FILTER_SANITIZE_STRING);?>"required>
        <div class="error">
          <?=filter_var($firstNameError, FILTER_SANITIZE_STRING); ?>
        </div>
      </div>
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" name="lastName" placeholder="Last name" value="<?=filter_var($lastName, FILTER_SANITIZE_STRING);?>"required> 
        <div class="error">
        <?=filter_var($lastNameError, FILTER_SANITIZE_STRING);?>
      </div>
    </div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="text" class="form-control" name="username" placeholder="Username" value="<?=filter_var($username, FILTER_SANITIZE_STRING);?>"required>
  <div class=" error">
    <?=filter_var($usernameError, FILTER_SANITIZE_STRING); ?>
  </div>
</div>
<div class="col col-12 col-sm-6 mb-3 has-validation">
  <input type="email" class="form-control" name="emailAddress" placeholder="email@example.com" value="<?=filter_var($emailAddress, FILTER_SANITIZE_STRING);?>"required>
      <div class=" error">
  <?= filter_var($emailAddressError, FILTER_SANITIZE_STRING); ?>
</div>
</div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <div class="error">
      <?=filter_var($passwordError, FILTER_SANITIZE_STRING); ?>
    </div>
  </div>
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" name="confirmPassword" placeholder="Repeat password" required>
    <div class="error">
      <?=filter_var($confirmPasswordError, FILTER_SANITIZE_STRING); ?>
    </div>
  </div>
</div>
<button type="submit" class="btn button mb-3 w-100">Signup</button>
</form>
</div>




  <?php $content = ob_get_clean(); ?>

  <?php require('src/views/frontend/_frontendLayout.php'); ?>