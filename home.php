<?php
session_start();
require("checksession.php");
$now=time();
if($now>$_SESSION['end']){
	session_unset();
	session_destroy();
	header('location:everyones view.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>


  

</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>eShop home</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  
  
  
</head>
<style >
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

<body>
  <div>

  
    <nav class="navbar navbar-expand-lg navbar-dark font-weight-bold fixed-top" style="background-color: #9e005d;">
   <a class="navbar-brand" href="#"style="color: white"><h1>eShop</h1> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      



      <a class="nav-link active" href="home.php">
         
          <span><i class="fas fa-home"></i>Home</span>
        </a>
       <li class="nav-item">


        <a class="nav-link active " href="product/index.php">All category</a>
      </li>





       <a class="nav-link active" href="showcart.php">
          
          <span><i class="fas fa-shopping-cart"></i>My cart</span>
        </a>
         <li class="nav-item active">
        <a class="nav-link" href="orders/myorders.php">Order History</a>
      </li>

      <li class="nav-item active">

        <a class="nav-link active" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="contact.php">contact us</a>
      </li>
            
        
    </ul>

    <form class="form-inline my-2 my-lg-0" action="product/search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <li class="nav-item">
         <a class="nav-link active" href="tanjidlogout.php">Logout (<?php echo $_SESSION['username'] ?>)</a >
      </li> 

         
    </ul>  


  </div>
</nav>





<div id="demo" class="carousel slide" data-ride="carousel">

 





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <footer class="py-4">
  <p class="p-2  text-white text-center" style="background-color: #9e005d;">@eShop</p>
</footer>

</body>


</html>
