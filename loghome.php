<?php 
session_start();
// for automatic session destroy
$_SESSION['start']=time();
$_SESSION['end']=$_SESSION['start']+(.5*60);

$con= mysqli_connect('localhost','root');

mysqli_select_db($con,'Inventory');
$name = filter_var($_POST['user'],FILTER_SANITIZE_STRING);
// $pass = $_POST['password'];
$hashpass=hash("sha256",$_POST['password']);
$pass=$hashpass;

$ipadd=$_SESSION['ip'];

if(isset($_POST['submit']))
{
$q = "SELECT * From registration where name = '$name' && password='$pass'  ";
$result=mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if($num == 1){
	$query="UPDATE users_ip SET retry_limit = 10 WHERE ip_address='$ipadd'";
	mysqli_query($con,$query);

	$p = "SELECT * From registration where  type like 'admin' and name='$name' ";
    $result=mysqli_query($con,$p);
    $num1 = mysqli_num_rows($result);
    if ($num1 == 1)
    {
    	$_SESSION['username']=$name;
		   header('location:adminhome.php');
	
    }
    else
    {
     $_SESSION['username']=$name;
		 header('location:home.php');

    }
	

}else{
	if($_SESSION['limit']==0){
		header('location:password.php');
	}
	$_SESSION['limit']=$_SESSION['limit']-1;
	$relimit=$_SESSION['limit'];
	$query="UPDATE users_ip SET retry_limit = $relimit WHERE ip_address='$ipadd'";
	mysqli_query($con,$query);
	session_unset();
	session_destroy();
	// header('location:everyones view.php');
	echo "<script> alert('wrong user name or password '); window.location='everyones view.php'</script>";
}


}
 ?>