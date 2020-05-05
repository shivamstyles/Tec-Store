<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');

    }
    $item_id=$_GET['id'];
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
        <style>
           /* The side navigation menu */
            .sidebar {
              top:50px;
              margin: 0;
              padding: 0;
              width: 200px;
              background-color: #222222;
              position: fixed;
              height: 100%;
              overflow: auto;
            }

            /* Sidebar links */
            .sidebar a {
              display: block;
              color: #9d9d9d;
              padding: 16px;
              text-decoration: none;
            }

            /* Active/current link */

            /* Links on mouse-over */
            .sidebar a:hover:not(.active) {
              background-color: #555;
              color: white;
            }
            #select:focus{ 
              color: green; 
              background-color: white;  
             } 
             a.activeMenuItem {
                background-color: #F00;
                font-weight: bold;
                }

            /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
            div.content {
              margin-left: 200px;
              padding: 1px 16px;
              height: auto;
            }

            /* On screens that are less than 700px wide, make the sidebar into a topbar */
            @media screen and (max-width: 700px) {
              .sidebar {
                width: 100%;
                height: auto;
                position: relative;
              }
              .sidebar a {float: left;}
              div.content {margin-left: 0;}
            }

            /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
           /* @media screen and (max-width: 400px) {
              .sidebar a {
                text-align: center;
                float: none;
              }
            }*/
        </style>
        <script>
            $(document).ready(function(){
                    var match = document.getElementById("a<?php echo $item_id ?>");
                    match.style.background = "white";
                    match.style.color = "black";
            });
        </script>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="sidebar">
                <a id="a1" href="admin_sensor_submit?id=1">Arduino Uno</a>
                <a id="a2" href="admin_sensor_submit?id=2">Ultrasonic Sensor</a>
                <a id="a3" href="admin_sensor_submit?id=3">LCD Display</a>
                <a id="a4" href="admin_sensor_submit?id=4">Servo Motor</a>
                <a id="a5" href="admin_sensor_submit?id=5">NodeMCU</a>
                <a id="a6" href="admin_sensor_submit?id=6">Bluetooth Module</a>
                <a id="a7" href="admin_sensor_submit?id=7">RFID Module</a>
                <a id="a8" href="admin_sensor_submit?id=8">PIR Sensor</a>
                <a id="a9" href="admin_sensor_submit?id=9">Touch Sensor</a>
                <a id="a10" href="admin_sensor_submit?id=10">L298d Motor Driver</a>
                <a id="a11" href="admin_sensor_submit?id=11">IR Sensor</a>
                <a id="a12" href="admin_sensor_submit?id=12">LDR</a>
            </div>

            <!-- Page content -->
            <div class="content">
                <?php
                    $item_id=$_GET['id'];
                ?>
                <br><br><br><br>
                <div class="table-responsive">
                    <div class="container">
                        <table class="table table-bordered table-striped">
                            <caption>Details</caption>
                            <tbody>
                                <tr>
                                    <th>Item ID</th><th>Item Name</th><th>Price</th><th>Total Quantity</th><th>Current Quantity</th>
                                </tr>
                                <?php
                                    $user_authentication_query="select * from items where id='$item_id'";
                                    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
                                    $row=mysqli_fetch_array($user_authentication_result);
                                    $item_id=$row['id'];  //user id
                                    $item_name=$row['name'];
                                    $price=$row['price'];
                                    $total_quantity=$row['total_quantity'];
                                    $current_quantity=$row['current_quantity'];
                                ?>
                                <tr>
                                    <th><?php echo $item_id ?></th><th><?php echo $item_name ?></th><th><?php echo $price ?></th><th><?php echo $total_quantity ?></th><th><?php echo $current_quantity ?></th>
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
                                    <th>S. No.</th><th>Item Name</th><th>Name</th><th>Email Id</th><th>Date (YYYYMMDD) & Time</th>
                                </tr>
                                <?php
                                $sql="select user_name, item_name, email_id, date_and_time, status from users_items where item_id='$item_id' and status='Confirmed'";
                                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                                $counter = 1;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $field0name = $counter;
                                    $field1name = $row["item_name"];
                                    $field2name = $row["user_name"];
                                    $field3name = $row["email_id"];
                                    $field4name = $row["date_and_time"];
                                    $field5name = $row["status"]; 
                                    echo '<tr>
                                            <td>'.$field0name.'</td>    
                                            <td>'.$field1name.'</td> 
                                            <td>'.$field2name.'</td> 
                                            <td>'.$field3name.'</td> 
                                            <td>'.$field4name.'</td> 
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
                                    <th>S. No.</th><th>Item Name</th><th>Name</th><th>Email Id</th><th>Date (YYYYMMDD) & Time</th>
                                </tr>
                                <?php
                                $sql="select user_name, item_name, email_id, date_and_time, status from users_items where item_id='$item_id' and status='Borrowed'";
                                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                                $counter = 1;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $field0name = $counter;
                                    $field1name = $row["item_name"];
                                    $field2name = $row["user_name"];
                                    $field3name = $row["email_id"];
                                    $field4name = $row["date_and_time"];
                                    $field5name = $row["status"]; 
                                    echo '<tr>
                                            <td>'.$field0name.'</td>    
                                            <td>'.$field1name.'</td> 
                                            <td>'.$field2name.'</td> 
                                            <td>'.$field3name.'</td> 
                                            <td>'.$field4name.'</td>
                                          </tr>';
                                    $counter = $counter + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br><br>
                <div class="container">
                    <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Sensor Control</a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="text-align: center;"><b><?php echo $item_name ?></b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Warning!</strong> Any mistake in changing item quantity may lead to data corruption.
                                    </div>
                                    <p><b>The entered number will be either added or reduced from the existing quantity.</b></p>
                                    <form method="post" action="admin_add_sensor.php?id=<?php echo $item_id ?>">
                                        <div class="form-group"> 
                                            <input type="number" class="form-control" name="add_no" placeholder="Enter positive for addition & negative for subtraction." required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add" class="btn btn-primary btn-block">
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
                <br><br>
            </div>
        </div>
    </body>
</html>


