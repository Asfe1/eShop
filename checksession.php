<?php
if(!isset($_SESSION['username']))
{
  header("location: everyones view.php");
  exit();
}
?>