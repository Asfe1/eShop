<?php


$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
?>
<?php
session_start();
$pid=$_GET['sid'];
$username=$_SESSION['username'];
$res=mysqli_query($link,"SELECT * from products where pid='$pid'");




while ($row=mysqli_fetch_array($res)) {
 $pname=$row["product_name"];

}
mysqli_query($link,"insert into cart(user_name,product_name,pid,confirmation,delevery,flag,Date) values('$username','$pname','$pid','no','no','0',now())");
header('location:product/index.php');
 ?>

