<?php
    // start the session, if a session isn't active already
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>User login</title>
    
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
                    <li class="active"><a href="index.php">Login</a></li>
                    <li><a href="public.html">Public Access</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container main">
        
        <form class="form-signin" action="login.php" method="post">
            <h2>Please sign in</h2>
            
            <span class="error">
                <?php
                    // check if a session variable 'error' has been set and if its value is set to true
                    if (isset($_SESSION['error']) && $_SESSION['error'] == true) {
                        // if error is true, then the user has input incorrect login credentials. Notify the user of this.
                        echo('Incorrect username or password.');
                    }
                    // unset the error variable, so that the user isn't notified again later when they revisit the page.
                    unset($_SESSION['error']);
                ?>
            </span>
            <label for="inputName" class="sr-only">Username</label>
            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Username" required autofocus>
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            
        </form>
        
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>