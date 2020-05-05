<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }
    else
    {
        $name=$_POST['name'];
        $contact=$_POST['contact'];
        $confirm_query="update store_manager set name='$name'";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $confirm_query="update store_manager set contact='$contact'";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: admin_store_manager.php');
    }
    ?>