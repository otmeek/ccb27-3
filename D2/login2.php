<?php

// start a session if a session isn't active already
session_start();

// save the user inputs to memory as variables.
$username = $_POST['inputName'];
$password = $_POST['inputPassword'];

// log valid username and password
$adminUser = 'admin';
$adminPass = 'stats123';

// check that the input username and password are equal to the valid username and password
if($username == $adminUser && $password == $adminPass) {
    // if it is, print a login successful message
    echo('Login successful!');
    $_SESSION['error'] = false;
    // create a session variable "user" that is equal to the input username
    $_SESSION['user'] = $username;
    // redirect the user to the menu
    header("location: statistics2.php");
}
else {
    // if the input username and password are not equal to the valid credentials, the inputs are wrong
    // print a login failed message.
    echo('Login failed.');
    // create a session variable "error" that keeps track of invalid logins and prints an error message on the login page
    $_SESSION['error'] = true;
    // redirect the user to the login page.
    header("location: statistics.php");
}

?>