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
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Projectworlds Store</title>
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
        </div>
    </body>
</html>