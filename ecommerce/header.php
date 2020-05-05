<?php
    require 'connection.php';?>
<nav style="background-color: rgba(0,0,0,0.85)" class="navbar navbar-inverse navbar-fixed-top">
 <div class="container">
     <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
         <a href="index.php" class="navbar-brand">Tec-Store</a>
     </div>
     
     <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav navbar-right">
             <?php
             if(isset($_SESSION['email']))
             {
                $user_id=$_SESSION['id'];
                $user_products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id' and ut.status='Added to cart'";
                $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                $no_of_user_products= mysqli_num_rows($user_products_result);
                if($no_of_user_products>0){
               ?>
                   <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"><?php echo $no_of_user_products ?></span></a></li>
                   <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                   <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               <?php
               }else{
                ?>
                   <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                   <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                   <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             <?php
             }}else{
              ?>
              <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
             <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             <?php
             }
             ?>
             
         </ul>
     </div>
 </div>
</nav>