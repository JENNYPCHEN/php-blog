<?php $title = 'ChingYi P.C | Personal Blog | sign up'; ?>
<?php ob_start(); ?>
<!--background-->
<div style="background-image: url('public/img/sea.png');">
<!--signup-->
<div class="container-fluid">
  <form class="ms-5 me-5 needs-validation" id="signup-form" action="index.php?action=signup" method="post">
    <h1 class="h3 p-4 fw-normal text-center cardtitle">Sign up</h1>
    <div class="row">
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" name="firstName" placeholder="First name" value="<?=$firstName ?>" required>
        <div class="invalid-feedback">
          <?php echo $firstNameError ?>
        </div>
      </div>
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" name="lastName" placeholder="Last name" value="<?=$lastName ?>"required> 
        <div class=" invalid-feedback">
        <?php echo $lastNameError ?>
      </div>
    </div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username?>"required>
  <div class=" invalid-feedback">
    <?php echo $usernameError ?>
  </div>
</div>
<div class="col col-12 col-sm-6 mb-3 has-validation">
  <input type="email" class="form-control" name="emailAddress" placeholder="email@example.com" value="<?=$emailAddress?>"required>
      <div class=" invalid-feedback">
  <?php echo $emailAddressError ?>
</div>
</div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" name="password" placeholder="Password"required>
    <div class="invalid-feedback">
      <?php echo $passwordError ?>
    </div>
  </div>
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" name="confirmPassword" placeholder="Repeat password"required>
    <div class="invalid-feedback">
      <?php echo $confirmPasswordError ?>
    </div>
  </div>
</div>
<button type="submit" class="btn button mb-3 w-100">Signup</button>
</form>
</div>




  <?php $content = ob_get_clean(); ?>

  <?php require('src/views/frontend/_frontendLayout.php'); ?>