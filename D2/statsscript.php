<?php

session_start();

if($_SESSION['user'] == 'admin') {
    header("location: statistics2.php");
}
else {
    header("location: statistics.php");
}

?>