<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }  
    $old_password= md5(md5(mysqli_real_escape_string($con,$_POST['oldPassword'])));
    $new_password= md5(md5(mysqli_real_escape_string($con,$_POST['newPassword'])));
    $password=$_SESSION['password'];
    //echo $email;
    $password_from_database_query="select password from admin";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    //echo $row['password'];
    if($row['password']==$old_password){
        $update_password_query="update admin set password='$new_password'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Your password has been updated. Please wait...";
        ?>
        <meta http-equiv="refresh" content="3;url=admin.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="1;url=admin_password_change.php" />
        <?php
        //header('location:settings.php');
    }
?>