
<?php
    
// start a session variable if one isn't active already
session_start();

// if the session variable user isn't set, user hasn't logged in yet, so redirect user to the login page
if(!isset($_SESSION['user']) || $_SESSION['user'] != 'admin') {
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
    
    <title>Statistics</title>
    
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
                    <li class="active"><a href="statsscript.php">Statistics</a></li>
                    <li><a href="secure2.php">Secure2</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container main">
        
        <h1>Statistics</h1>
        <p>User login data below.</p>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Username</th>
                    <th>Browser</th>
                    <th>IP</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                    // sql credentials
                    $host  = '0.0.0.0';
                    $user  = "otmeek";
                    $pass  = "";
                    $table = "login";
                    
                    // connect and access db
                    $connection = mysql_connect($host, $user, $pass)or die(mysql_error());
                    $db         = mysql_select_db("unit27", $connection);
                    
                    // formulate query and print results as table components
                    $sql    = "SELECT * FROM `$table`";
                    $result = mysql_query($sql, $connection);
                    $count  = 0;
                    while($row = mysql_fetch_array($result)) {
                        $count++;
                        echo("<tr>");
                            echo("<td>$count</td>");
                            echo("<td>".$row['username']."</td>");
                            echo("<td>".$row['browser']."</td>");
                            echo("<td>".$row['ip']."</td>");
                            echo("<td>".$row['date']."</td>");
                        echo("</tr>");
                    }
                
                ?>
                
            </tbody>
        </table>
        
        <form class="form-signin" action="logout.php" method="post">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign out</button>
        </form>
        
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>