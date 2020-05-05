<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
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
                <a href="admin_password_change.php" class="btn btn-primary btn-block">Change Password</a>
            </div>
            <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>ENTER USER ID</h3>
                            </div>
                            <div class="panel-body">
                                <p>Enter User ID for User's details.</p>
                                <form method="get" action="admin_control.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <!--<div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>-->
                        </div>
                    </div>
                </div>
           </div>
            
            <br><br><br>
            <div class="container">
                <a href="admin_sensor_enquiry.php?id=1" class="btn btn-primary btn-block">Sensor Enquiry & Control</a>
             </div>
             <br><br><br>
             <div class="container">
                <a href="admin_store_manager.php" class="btn btn-primary btn-block">Store Manager</a>
             </div>



            <br><br><br>
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
