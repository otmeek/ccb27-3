
<?php
    
// start a session variable if one isn't active already
session_start();

// if the session variable user isn't set, user hasn't logged in yet, so redirect user to the login page
if(!isset($_SESSION['user'])) {
    // redirect to login page
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Secure1</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="menu.php">Menu</a></li>
                    <li class="active"><a href="secure1.php">Secure1</a></li>
                    <li><a href="secure2.php">Secure2</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container main">
        
        <h1>Secure1</h1>
        <p><?php echo('Hello '.$_SESSION['firstname'].' '.$_SESSION['surname']); ?>.</p>
        <!-- display the logged in username and IP address -->
        <p>Username: <?php echo($_SESSION['user']); ?></p>
        <p>IP address: <?php echo($_SERVER['REMOTE_ADDR']) ?></p>
        
        <form class="form-signin" action="logout.php" method="post">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign out</button>
        </form>
        
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>