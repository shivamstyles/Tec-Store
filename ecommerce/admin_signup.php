<?php
    require 'connection.php';
    session_start();
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=settings.php" />
        <?php
    }
    $duplicate_user_query="select password from admin";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Password already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
    }else{
        $user_registration_query="insert into admin(password) values ('$password')";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "Admin successfully registered";
        //$_SESSION['email']=$email;
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        //$_SESSION['id']=mysqli_insert_id($con); 
        //header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=products.php" />
        <?php
    }
    
?>