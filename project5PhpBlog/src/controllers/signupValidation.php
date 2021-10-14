<?php 
$usernameError ="";
$emailAddressError ="";
$passwordError = "";
$confirmPasswordError = "";
$username=$_POST["username"];
$emailAddress=$_POST["emailAddress"];
$password=$_POST["password"];
$confirmPassword=$_POST["confirmPassword"];

$nameValidation = "/^[a-zA-Z0-9]*$/";
$passwordValidation = "/^(.{0-7}|[^a-z]*|[^\d]*)$/i";

if (!preg_match($nameValidation, $username)) {
$usernameError = "Name can only contain letters and numbers";
}
if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
$emailAddressError = "Please enter the correct format.";
}
if (!preg_match($passwordValidation, $password)) {
$passwordError = "Password must have at least one numeric value.";
} 
elseif (strlen($password) < 6) { 
    $passwordError="Password must have at least 8 characters." ; 
} elseif ($password !=$confirmPassword) { 
    $confirmPasswordError="Passwords do not match, please try again." ;
 } 

if(!empty($usernameError)or !empty($emailAddressError) or!empty($passwordError) or!empty($confirmPasswordError)){
    header('Location:index.php?action=signuppage');
}