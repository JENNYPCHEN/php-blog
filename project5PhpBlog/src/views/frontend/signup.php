<?php $title = 'ChingYi P.C | Personal Blog | sign up'; ?>
<?php ob_start(); ?>
<!--signup-->
<div class="container-fluid">
  <form class="ms-5 me-5 needs-validation" method="post">
    <h1 class="h3 p-4 fw-normal text-center cardtitle">Sign up</h1>
    <div class="row">
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" id="firstName" placeholder="First name" value="<?php echo $user['firstName'] ?>">
        <div class="invalid-feedback">
          <?php echo $data['firstNameError']; ?>
        </div>
      </div>
      <div class="col col-12 col-sm-6 mb-3 has-validation">
        <input type="text" class="form-control" id="lastName" placeholder="Last name" value="<?php echo $user['lastName'] ?>> 
        <div class=" invalid-feedback">
        <?php echo $data['lastNameError']; ?>
      </div>
    </div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $user['username'] ?>>
  <div class=" invalid-feedback">
    <?php echo $data['usernameError']; ?>
  </div>
</div>
<div class="col col-12 col-sm-6 mb-3 has-validation">
  <input type="email" class="form-control" id="emailAddress" placeholder="email@example.com" value="<?php echo $user['emailAddress'] ?>>
      <div class=" invalid-feedback">
  <?php echo $data['emailAddressError']; ?>
</div>
</div>
</div>
<div class="row">
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" id="password" placeholder="Password">
    <div class="invalid-feedback">
      <?php echo $data['passwordError']; ?>
    </div>
  </div>
  <div class="col col-12 col-sm-6 mb-3 has-validation">
    <input type="password" class="form-control" id="confirmPassword" placeholder="Repeat password">
    <div class="invalid-feedback">
      <?php echo $data['confirmPasswordError']; ?>
    </div>
  </div>
</div>
<button type="submit" value="submit" class="btn button mb-3 w-100">Signup</button>
</form>
</div>


<a class="text-center" </div>
  <?php $content = ob_get_clean(); ?>

  <?php require('src/views/frontend/_frontendLayout.php'); ?>