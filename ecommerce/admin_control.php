<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }
    $email=mysqli_real_escape_string($con,$_GET['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to Admin page...";
        ?>
        <meta http-equiv="refresh" content="2;url=admin.php" />
        <?php
    }
    $user_authentication_query="select * from users where email='$email'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username");
        </script>
        <meta http-equiv="refresh" content="1;url=admin.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else
    {
        $row=mysqli_fetch_array($user_authentication_result);
        $user_id=$row['id'];  //user id
        $user_name=$row['name'];
        $roll_no=$row['roll_no'];
        $user_contact=$row['contact'];
        $user_adress=$row['address'];
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
                        <caption>Details</caption>
                        <tbody>
                            <tr>
                                <th>User ID</th><th>Name</th><th>Roll NO.</th><th>Contact</th><th>Hostel Address</th>
                            </tr>
                            <tr>
                                <th><?php echo $user_id ?></th><th><?php echo $user_name ?></th><th><?php echo $roll_no ?></th><th><?php echo $user_contact ?></th><th><?php echo $user_adress ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <caption>Order Request</caption>
                        <tbody>
                            <tr>
                                <th>S. No.</th><th>Name</th><th>Item Name</th><th>price</th><th>Date(YYYYMMDD) & Time</th><th>Status</th><th>Action</th>
                            </tr>
                            <?php
                            $sql="select users_items.serial_id, users_items.user_name, users_items.item_id, users_items.item_name, items.price, users_items.date_and_time, users_items.status from users_items inner join items on users_items.item_id=items.id where users_items.email_id='$email' and status='Confirmed'";
                            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                            $counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $item_id=$row["item_id"];
                                $unique = $row["serial_id"];
                                $field0name = $counter;
                                $field1name = $row["user_name"];
                                $field2name = $row["item_name"];
                                $field3name = $row["price"];
                                $field4name = $row["date_and_time"];
                                $field5name = $row["status"]; 
                                echo '<tr>
                                        <td>'.$field0name.'</td>    
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td> 
                                        <td><a href="admin_borrow_submit.php?serial_id='.$unique.'&email='.$email.'" class="btn btn-primary">Borrow</a> &nbsp; &nbsp; <a href="admin_reject_submit.php?serial_id='.$unique.'&email='.$email.'&item_id='.$item_id.'" class="btn btn-primary">Reject</a></td>
                                      </tr>';
                                $counter = $counter + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <caption>Borrowed</caption>
                        <tbody>
                            <tr>
                                <th>S. No.</th><th>Name</th><th>Item Name</th><th>price</th><th>Date(YYYYMMDD) & Time</th><th>Status</th><th>Action</th>
                            </tr>
                            <?php
                            $sql="select users_items.serial_id, users_items.user_name, users_items.item_id, users_items.item_name, items.price, users_items.date_and_time, users_items.status from users_items inner join items on users_items.item_id=items.id where users_items.email_id='$email' and status='Borrowed'";
                            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                            $counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $item_id=$row["item_id"];
                                $unique = $row["serial_id"];
                                $field0name = $counter;
                                $field1name = $row["user_name"];
                                $field2name = $row["item_name"];
                                $field3name = $row["price"];
                                $field4name = $row["date_and_time"];
                                $field5name = $row["status"]; 
                                echo '<tr>
                                        <td>'.$field0name.'</td>    
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td> 
                                        <td><a href="admin_return_submit.php?serial_id='.$unique.'&email='.$email.'&item_id='.$item_id.'" class="btn btn-primary">Return</a></td>
                                      </tr>';
                                $counter = $counter + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <caption>Order Returned</caption>
                        <tbody>
                            <tr>
                                <th>S. No.</th><th>Name</th><th>Item Name</th><th>price</th><th>Date(YYYYMMDD) & Time</th><th>Status</th>
                            </tr>
                            <?php
                            $sql="select users_items.serial_id, users_items.user_name, users_items.item_id, users_items.item_name, items.price, users_items.date_and_time, users_items.status from users_items inner join items on users_items.item_id=items.id where users_items.email_id='$email' and status='Returned'";
                            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                            $counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $item_id=$row["item_id"];
                                $unique = $row["serial_id"];
                                $field0name = $counter;
                                $field1name = $row["user_name"];
                                $field2name = $row["item_name"];
                                $field3name = $row["price"];
                                $field4name = $row["date_and_time"];
                                $field5name = $row["status"]; 
                                echo '<tr>
                                        <td>'.$field0name.'</td>    
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td> 
                                      </tr>';
                                $counter = $counter + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <caption>Order Rejected</caption>
                        <tbody>
                            <tr>
                                <th>S. No.</th><th>Name</th><th>Item Name</th><th>price</th><th>Date(YYYYMMDD) & Time</th><th>Status</th>
                            </tr>
                            <?php
                            $sql="select users_items.serial_id, users_items.user_name, users_items.item_id, users_items.item_name, items.price, users_items.date_and_time, users_items.status from users_items inner join items on users_items.item_id=items.id where users_items.email_id='$email' and status='Rejected'";
                            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                            $counter = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $item_id=$row["item_id"];
                                $unique = $row["serial_id"];
                                $field0name = $counter;
                                $field1name = $row["user_name"];
                                $field2name = $row["item_name"];
                                $field3name = $row["price"];
                                $field4name = $row["date_and_time"];
                                $field5name = $row["status"]; 
                                echo '<tr>
                                        <td>'.$field0name.'</td>    
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td> 
                                      </tr>';
                                $counter = $counter + 1;
                            }
                            ?>
                        </tbody>
                    </table>
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