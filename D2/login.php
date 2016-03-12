<?php

// start a session if a session isn't active already
session_start();

// save the user inputs to memory as variables.
$username = $_POST['inputName'];
$password = $_POST['inputPassword'];

// mysql credentials
$host = '0.0.0.0';
$user = "otmeek";
$pass = "";
$port = 3306;

// connect to the db
$connection = mysql_connect($host, $user, $pass)or die(mysql_error());
$db = mysql_select_db("unit27", $connection);

// formulate sql query that matches the username and encrypted password. The SHA1() function is used to compare the password to the encrypted stored version
$sql = "SELECT * FROM `users` WHERE username = '$username' AND password = SHA1('$password')";

// perform query
$rs  = mysql_query($sql, $connection);
$row = mysql_fetch_array($rs);

// get some data about the login attempt. We will need this for later
$getIP       = $_SERVER['REMOTE_ADDR'];
$getBrowser  = $_SERVER['HTTP_USER_AGENT'];
$getDateTime = date('D, d M Y H:i:s');
$getDate     = date('Y-m-d');

// if $row === false, then there is no such user on the database
if($row === false) {
    echo('No such user.');
    // create a session variable "error" that keeps track of invalid logins and prints an error message on the login page
    $_SESSION['error'] = true;
    
    // write failed login data to a file
    logFailedLogin($getBrowser, $getIP, $username, $getDateTime);
    
    // redirect the user to the login page.
    header("location: index.php");
}
else {
    // login data matches!
    echo('Login successful!');
    $_SESSION['error'] = false;
    // create a session variable "user" that is equal to the input username
    $_SESSION['user'] = $username;
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['surname'] = $row['surname'];
    
    // insert login into logins table on db
    $db2   = mysql_select_db("login", $connection);
    $query = "INSERT INTO `login`(`username`, `browser`, `ip`, `date`) VALUES ('$username','$getBrowser','$getIP','$getDate')";
    $rs    = mysql_query($query, $connection);
    
    // redirect the user to the menu
    header("location: menu.php");
}

// this function writes failed login attempts to a .csv file
function logFailedLogin($browser, $ip, $username, $dateTime) {
    // open the file; create it if it doesn't exist
    $file = fopen("error_log.csv", "a");
    // entry containing all pertinent data
    $entry = $browser.','.$ip.','.$username.','.$dateTime."\r\n";
    // write contents of entry to the file
    fwrite($file, $entry);
    // close the file
    fclose($file);
}

?>