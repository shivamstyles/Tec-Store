<?php
    session_start();
    require 'connection.php';
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
                                <p><strong>Check out your email ID username activation.</strong></p>
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
