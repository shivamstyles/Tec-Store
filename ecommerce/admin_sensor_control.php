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
            <br><br><br>
            <div class="container">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Any mistake in changing item quantity may lead to data corruption.
                </div>
            </div>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <caption>Order Request</caption>
                    <tbody>
                        <tr>
                            <th>ID</th><th>Name</th><th>price</th><th>Total Quantity</th><th>Current Quantity</th><th>Action</th>
                        </tr>
                        <?php
                        $sql="select * from items";
                        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $field0name = $row["id"];
                            $field1name = $row["name"];
                            $field2name = $row["price"];
                            $field3name = $row["total_quantity"];
                            $field4name = $row["current_quantity"];
                            echo '<tr>
                                    <td>'.$field0name.'</td>    
                                    <td>'.$field1name.'</td> 
                                    <td>'.$field2name.'</td> 
                                    <td>'.$field3name.'</td> 
                                    <td>'.$field4name.'</td> 
                                    <td><a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</a> &nbsp; &nbsp; <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Remove</a></td>
                                  </tr>';
                                  ?>
                                  <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                            
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="admin_add_sensor.php?id=<?php echo $field0name ?>">
                                                    <div class="form-group"> 
                                                        <input type="number" class="form-control" name="roll_no" placeholder="Enter number" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Add" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <a href="admin_reject_submit.php?serial_id='.$unique.'&email='.$email.'&item_id='.$item_id.'" class="btn btn-primary" data-dismiss="modal">Add</a>
                                            </div>-->
                                        </div>  
                                    </div>
                                </div><?php
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>

            <br>
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




  
