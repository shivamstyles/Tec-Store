<?php
    require 'connection.php';
    session_start();
    if(!isset($_GET['email']) && empty($_GET['email']) AND isset(!$_GET['hash']) && empty($_GET['hash'])){
    // Verify data
        header('location:signup.php');
    }
    else
    {
        // Verify data
        $email = mysql_escape_string($_GET['email']); // Set email variable;
        $hash = mysql_escape_string($_GET['hash']); // Set hash variable
        $id=$_GET['id'];
        }
        $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
        $match  = mysql_num_rows($search);
        if($match > 0){
            // We have a match, activate the account
            mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
            // WHOLE HTML
        }else{
            // No match -> invalid url or account has already been activated.
            header('location:login.php');
        }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/Store.png" />
        <title>Tec-Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your email ID has been activated. Now you can <strong><a href="login.php">Login.</a></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy Tec-Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
