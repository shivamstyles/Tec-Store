<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }
    else
    {
    	$email=$_GET['email'];
    	$unique=$_GET['serial_id'];
        $confirm_query="update users_items set status='Borrowed' where serial_id=$unique";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: admin_control.php?email='.$email.'');
    }
    ?>