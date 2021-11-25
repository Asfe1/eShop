<?php
session_start();

$con= mysqli_connect('localhost','root');
mysqli_select_db($con,'Inventory');


function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = getenv("REMOTE_ADDR") ;
    }
    return $ip;
}

$ip=getUserIpAddr();

//ip already exist
$exist = "SELECT * From users_ip where ip_address = '$ip'";
$result=mysqli_query($con,$exist);
$num = mysqli_num_rows($result);

// if not exist
if($num==0){
	$qy="INSERT INTO users_ip (ip_address,retry_limit) values('$ip',10)";
	mysqli_query($con,$qy);
	$_SESSION['limit']=10;
	$_SESSION['ip']=$ip;
}
else{
	$row= mysqli_fetch_array($result);
	if($row['retry_limit']==0){
		header('location:password.php');
	}else{
		$_SESSION['limit']=$row['retry_limit'];
		$_SESSION['ip']=$ip;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
   <title>eShop home</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Modal Login Modal Form with Avatar Icon</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<style type="text/css">
    body {
    font-family: 'Varela Round', sans-serif;
  }
  .modal-login {    
    color: #636363;
    width: 400px;
  }
  .modal-login .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
  }
  .modal-login .modal-header {
    border-bottom: none;   
        position: relative;
        justify-content: center;
  }
  .modal-login h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -15px;
  }
  .modal-login .form-control:focus {
    border-color: #70c5c0;
  }
  .modal-login .form-control, .modal-login .btn {
    min-height: 40px;
    border-radius: 3px; 
  }
  .modal-login .close {
        position: absolute;
    top: -5px;
    right: -5px;
  } 
  .modal-login .modal-footer {
    background: #ecf0f1;
    border-color: #dee4e7;
    text-align: center;
        justify-content: center;
    margin: 0 -20px -20px;
    border-radius: 5px;
    font-size: 13px;
  }
  .modal-login .modal-footer a {
    color: #999;
  }   
  .modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #fff;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }
  .modal-login .avatar img {
    width: 100%;
  }
  .modal-login.modal-dialog {
    margin-top: 80px;
  }
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
    background: #211c1c;
    text-decoration: none;
    transition: all 0.4s;
        line-height: normal;
        border: none;
    }
  .modal-login .btn:hover, .modal-login .btn:focus {
    background: #627ec4;
    outline: none;
  }
  .trigger-btn {
    display: inline-block;
    margin: 100px auto;
  }
   body{
        background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url("img/n.jpg");
        height: 100vh;
        background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
      }
      .Header{
        margin-top: 100px;
        margin-left: 180px;
      }
      .Header h1{
        color: white;
      }
    </style>
  
</style>

<body>
  <div>

  <nav class="navbar navbar-expand-lg navbar-dark font-weight-bold fixed-top" style="background-color: #9e005d;">
   <a class="navbar-brand" href="#"style="color: white"><h1>eShop</h1> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      



      <a class="nav-link active" href="everyones view.php">
         
          <span><i class=""></i>Home</span>
        </a>
       <li class="nav-item">


          <li class="nav-item active">

        <a class="nav-link" href="#myModal" class="trigger-btn" data-toggle="modal">Login</a>

      </li>

  
          <li class="nav-item active">

        <a class="nav-link active" href="#myModal2" class="trigger-btn" data-toggle="modal">Sign-up</a>

      </li>


        <a class="nav-link active" href="product/index.php">All category</a>
      </li>
  

      <li class="nav-item">

        <a class="nav-link active" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="contact.php">contact us</a>
      </li>
            
        
    </ul>
<!--
    <form class="form-inline my-2 my-lg-0" action="product/search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

        
    </ul>  
         
    </ul>  


  </div>
</nav>



<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <form action="loghome.php" method="post">   
      <div class="modal-header">

        <div class="avatar">
          <img src="img/log.png" >

        </div> 

        <h4 class="modal-title"> Login</h4> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <input type="text" class="form-control" name="user" placeholder="Username" required="required">   
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"> 
          </div>        
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <h2>welcome</h2>
      </div>
    </div>
  </div>
</div>  


<div id="myModal2" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      
      <div class="modal-header">

        <div class="avatar">
          <img src="img/log.png" >

        </div> 
 <form action="registration.php" method="post">  
        <h4 class="modal-title"> Sign-up</h4> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        
           <div class="form-group">
            <input type="text" class="form-control" name="nam" placeholder="Enter name" required="required">   
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" required="required">
			<p style="font-size:10px;color:red;">Password should be 8 to 12 characters long and must contain 1 uppercase, 1 lowercase, 1 number and 1 special character.</p>
          </div>  

         <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email" required="required">   
          </div>

           <div class="form-group">
            <input type="tel" class="form-control" name="phnno" pattern="01[5-9]{1}[0-9]{8}" placeholder="Enter mobile no" required="required">   
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Enter address" required="required">   
          </div>

          <div class="form-group">
            <button type="submit" name="submit1" class="btn btn-primary btn-lg btn-block login-btn">Sign-up</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <h2>All in one place</h2>
      </div>
    </div>
  </div>
</div>  



<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow 
    <div class="py-5" >
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/16.png" >
    </div>
    <div class="carousel-item">
      <img src="img/13.png" >
    </div>
    <div class="carousel-item">
      <img src="img/15.png" >
    </div>
  </div>

-->
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>



  <!--  
<div class="title2">

  <h1 class="py-5">Managing Inventory</h1>
</div>

-->




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>



