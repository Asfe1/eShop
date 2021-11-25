<?php
  session_start();
   include_once('../connection.php');

 $cid=$_GET['cid'];


   $query="Update cart set delevery='yes' where  cid='$cid'";
    mysqli_query($con,$query);
    header('location:newordershow.php');
?>