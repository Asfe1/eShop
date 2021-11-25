<?php
  session_start();
   include_once('connection.php');
 $pid=$_GET['pid'];
 $username=$_SESSION['username'];
 
   $query="delete  from cart where pid='$pid' && user_name='$username'";
    mysqli_query($con,$query);
    header('location:showcart.php');
?>