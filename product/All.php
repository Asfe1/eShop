

<?php


$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
?>
<?php
session_start();

$username=$_SESSION['username'];

mysqli_query($link,"Update products set p_status='1' ");
//echo '<script>alert("Item Confirmed")</script>'; 
// echo '<script>window.location="showcart.php"</script>';
 header('location:index.php'); 

 ?>


