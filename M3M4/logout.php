<?php

// start a session if one isn't active already
session_start();

// unset all session variables in order to log out user.
unset($_SESSION['error']);
unset($_SESSION['user']);
unset($_SESSION['firstname']);
unset($_SESSION['surname']);

// redirect to login page
header("location: index.php");
?>