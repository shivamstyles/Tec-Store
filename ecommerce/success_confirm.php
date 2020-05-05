<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id and status='Ordered'" ;
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $query="select * from store_manager";
        $query_result=mysqli_query($con,$query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($query_result);
        $name=$row['name'];
        $contact=$row['contact'];
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
                                <p>Your order is confirmed. Thank you for shopping with us.</p>
                                <p><b>Note: Your Borrowing time will be same as your Ordering time.</b></p>
                                <p>You can borrow your Order from <strong><?php echo $name ?></strong>. Contact : <strong><?php echo $contact ?></strong></p>
                                <p><b><a href="products.php">Click here</a></b> to purchase any other item.</p>
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
