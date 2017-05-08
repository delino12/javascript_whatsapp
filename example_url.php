<?php
// catch from form data
// the register_user.php
# assign get ajax data from request
$fname = $_REQUEST['fname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$phone = $_REQUEST['phone'];

// you can encrypt password
$password = md5(sha1($password));

// now u can sign up user successfully
$register_user = new CreateUser($fname, $email, $password, $phone);
$register_user->saveUser();
$register_user->sendWelcomeMsg();
$register_user->sendActivation();

?>