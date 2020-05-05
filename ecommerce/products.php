<?php
    session_start();
    require 'check_if_added.php';
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
            body
            {
                background-color: black;
            }
        </style>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br><br>
            <div class="container">
                <center>
                <div class="jumbotron">
                    <h1>Welcome to Tec-Store!</h1>
                    <p>We have varieties of Sensors and other components available, all in one place.</p>
                </div>
            </center>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/uno.png" alt="Arduino">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Arduino UNO</h3>
                                    <p>Price: Rs. 50.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(1))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(1)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=1&name=arduino_uno" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/ultra.png" alt="ultrasonic_sensor">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Ultrasonic Sensor</h3>
                                    <p>Price: Rs. 10.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(2))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(2)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=2&name=ultrasonic_sensor" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/lcd.jpg" alt="LCD">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>16x2 LCD</h3>
                                    <p>Price: Rs. 10.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(3))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(3)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=3&name=lcd" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/servo.jpg" alt="Servo">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>SG 90 Servo Motor</h3>
                                    <p>Price: Rs. 20.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(4))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(4)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=4&name=sg90_servo_motor" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/node.png" alt="NodeMCU">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>NodeMCU Wifi Board</h3>
                                    <p>Price: Rs. 45.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(5))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(5)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=5&name=node_mcu" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/bluetooth.png" alt="Bluetooth">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Bluetooth Module</h3>
                                    <p>Price: Rs. 20.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(6))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(6)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=6&name=bluetooth_module" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/rfid.png" alt="RFID">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>RFID Reader Module</h3>
                                    <p>Price: Rs. 25.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(7))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(7)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=7&name=rfid_module" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/pir.png" alt="pir_sensor">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>PIR Sensor</h3>
                                    <p>Price: Rs. 5.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(8))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(8)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=8&name=pir_sensor" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/touch.png" alt="touch_sensor">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>Touch Sensor</h3>
                                    <p>Price: Rs. 35.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(9))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(9)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=9&name=touch_sensor" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/driver.png" alt="l298d_motor_driver">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>L298d Motor Driver</h3>
                                    <p>Price: Rs. 20.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(10))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(10)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=10&name=l298d_motor_driver" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/ir.png" alt="ir_sensor">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>IR (Infrared) Sensor</h3>
                                    <p>Price: Rs. 10.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(11))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(11)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=11&name=ir_sensor" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/ldr.jpg" alt="LDR">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3>LDR Sensor</h3>
                                    <p>Price: Rs. 15.00</p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(out_of_stock(12))
                                            {
                                                echo '<a href="#" class="btn btn-block btn-danger disabled">Out of Stock</a>';
                                            }
                                            elseif(check_if_added_to_cart(12)){
                                                echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=12&name=ldr" class="btn btn-block btn-primary " name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
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
