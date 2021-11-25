<?php
  session_start();
   include_once('../connection.php');

 $pid=$_GET['pid'];
echo"$pid";

   $query="Delete  from review where rid='$pid'";
    mysqli_query($con,$query);
    header('location:productreview.php');
?>