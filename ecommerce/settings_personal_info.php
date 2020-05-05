<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    else
    {
        $name=$_POST['name'];
        $contact=$_POST['contact'];
        $confirm_query="update users set address='$name'";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $confirm_query="update users set contact='$contact'";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: settings.php');
    }
    ?>