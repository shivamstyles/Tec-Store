<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
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
                <a href="settings_password.php" class="btn btn-primary btn-block">Change Password</a>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <h1><b> ADMIN SIGN UP</b></h1>
                        <form method="post" action="admin_signup.php">
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>ADMIN LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Only for Admin.</p>
                                <form method="post" action="admin_login_submit.php">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                           <!-- <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>-->
                        </div>
                    </div>
                </div>
           </div>

            <br>
            <div class="container">
                <a href="settings_history.php" class="btn btn-primary btn-block">Order History</a>
            </div>
            <br>
            <div class="container">
                    <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Change Personal Info</a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="text-align: center;"><b>Personal Info</b></h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>Enter Current Hostel Address.</b></p>
                                    <form method="post" action="settings_personal_info.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Hostel Name & Room No." required="true">
                                        </div>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong> Any mistake in entering Contact info may cause borrowing problems.
                                        </div>
                                        <div class="form-group"> 
                                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Change" class="btn btn-primary btn-block">
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer">
                                    <a href="admin_reject_submit.php?serial_id='.$unique.'&email='.$email.'&item_id='.$item_id.'" class="btn btn-primary" data-dismiss="modal">Add</a>
                                </div>-->
                            </div>  
                        </div>
                    </div>
                </div>
            <br><br><br><br>
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
