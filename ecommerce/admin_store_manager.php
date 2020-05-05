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
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <caption>Current Store Manager</caption>
                        <tbody>
                            <tr>
                                <th>Name</th><th>Contact</th>
                            </tr>
                            <?php
                                $user_authentication_query="select * from store_manager ";
                                $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
                                $row=mysqli_fetch_array($user_authentication_result);
                                $name=$row['name'];  //user name
                                $contact=$row['contact'];
                            ?>
                            <tr>
                                <th><?php echo $name ?></th><th><?php echo $contact ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br><br>
                <div class="container">
                    <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Appoint New Store-Manager</a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="text-align: center;"><b>New Store Manager</b></h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>Enter full name.</b></p>
                                    <form method="post" action="admin_store_manager_submit.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                                        </div>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong> Any mistake in entering Contact info may cause borrowing problems.
                                        </div>
                                        <div class="form-group"> 
                                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Appoint" class="btn btn-primary btn-block">
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
        </div>
    </body>
</html>