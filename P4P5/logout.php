<?php

// start a session if one isn't active already
session_start();

// unset all session variables in order to log out user.
unset($_SESSION['error']);
unset($_SESSION['user']);

// redirect to login page
header("location: index.php");
?>