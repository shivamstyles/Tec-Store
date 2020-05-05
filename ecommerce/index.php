<?php
session_start();
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
        <style>
          body {
          /* Location of the image */

          background-image: url(img/appl.jpg);
          
          /* Image is centered vertically and horizontally at all times */
          background-position: center center;
          
          /* Image doesn't repeat */
          background-repeat: no-repeat;
          
          /* Makes the image fixed in the viewport so that it doesn't move when 
             the content height is greater than the image height */
          background-attachment: fixed;
          
          /* This is what makes the background image rescale based on its container's size */
          background-size: cover;
          
          /* Pick a solid background color that will be displayed while the background image is loading */
          background-color: white;
          
          /* SHORTHAND CSS NOTATION
           * background: url(background-photo.jpg) center center cover no-repeat fixed;
           */
        }
        #bannerContent{
            position:relative;
            padding-top:2%;
            padding-bottom:2%;
            margin-top:25%;
            margin-bottom:15%;
            color: white;
            background-color:rgba(0,0,0,0.3);
            max-width:660px;
        }
        #butn
        {
          background-color: rgba(0,0,0,0.7); 
          color: white;
        }
        #butn:hover
        {
          background-color: rgb(0,0,0); 
          color: white;
        }
        @media (min-width:320px){
            #autoResize{
                font-size:12px;
            }
        }
        @media (min-width:481px){
            #autoResize{
                font-size:16px;
            }
        }
        @media (min-width:641px){
            #autoResize{
                font-size:18px;
            }
        }
        @media (min-width:961px){
            #autoResize{
                font-size:20px;
            }
        }
        @media (min-width:1000px){
            #autoResize{
                font-size:26px;
            }
        }
        </style>
        
    </head>
    <body>
       <div>
         <?php
          require 'header.php';
         ?>
          <header class="container" >
               <center>
                 <div id="bannerContent">
                     <h1>MAKE YOUR OWN PROJECT</h1>
                     <p>Get your neccessary components.</p>
                     <div class="container" style="max-width: 300px">
                     <a href="products.php" class="btn btn-lg btn-block" id="butn">Shop Now</a>
                   </div>
                 </div>
               </center>
          </header>
        </div>
    </body>
</html>