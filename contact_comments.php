<?php 



session_start();

$name= $_SESSION['username'];


$con= mysqli_connect('localhost','root');

mysqli_select_db($con,'Inventory');
$tarea = $_POST['tarea'];

$qy="INSERT INTO message (name,comments) values('$name','$tarea')";
    mysqli_query($con,$qy);
    header('location:home.php');



 ?>