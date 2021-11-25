
 <?php 
session_start();

$newstr = filter_var($str,FILTER_SANITIZE_STRING);


$con= mysqli_connect('localhost','root');
if($con){
echo "connection successfull";
}else{
echo "connection faild";
}

mysqli_select_db($con,'Inventory');
$name = filter_var($_POST['nam'],FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$hashpass=hash("sha256",$pass);
$add = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
$number=filter_var($_POST['phnno'],FILTER_SANITIZE_STRING);
$word='admin';


if(isset($_POST['submit1']))
{

$q = "SELECT * From registration where name = '$name' || email ='$email' || mobile_no='$number' ";
$result=mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if($num == 1){
	
	 header('location:everyones view.php');

}else{
	if (strpos($email, $word)!==false){

	$qy=" INSERT INTO registration (name,password,address,email,mobile_no,type) values('$name','$hashpass','$add','$email','$number','admin')";
	mysqli_query($con,$qy);
	
	echo "<script> alert('Signup as a admin'); window.location='everyones view.php' </script>";

       }
       else{
       	$qy=" INSERT INTO registration (name,password,address,email,mobile_no,type) values('$name','$hashpass','$add','$email','$number','user')";
	mysqli_query($con,$qy);
	header('location:everyones view.php');
	echo "<script> alert('Signup as a user'); window.location='everyones view.php' </script>";


       }
}

}
 ?>