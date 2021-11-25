<?php
session_start();
require("checksession.php");

// to destroy session
$now=time();
if($now>$_SESSION['end']){
	session_unset();
	session_destroy();
	header('location:everyones view.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>eShop</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<style media="screen">
      body{
        background-image:url();
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

 <nav class="navbar navbar-expand-lg navbar-dark font-weight-bold fixed-top" style="background-color: #9e005d;">
  <a class="navbar-brand" href="#"style="color: white"><h1>eShop</h1> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">

       <a class="nav-link " href="home.php">
         
          <span><i class="fas fa-home"></i>Home</span>
        </a>
       <li class="nav-item">


        <a class="nav-link" href="product/index.php">All category</a>
      </li>



       <a class="nav-link " href="showcart.php">
          
          <span><i class="fas fa-shopping-cart"></i>My cart</span>
        </a>

         <li class="nav-item ">
        <a class="nav-link" href="orders/myorders.php">Order History</a>
      </li>

      <li class="nav-item">

        <a class="nav-link active" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php">contact us</a>
      </li>
               
        
    </ul>

    <form class="form-inline my-2 my-lg-0" action="product/search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <li class="nav-item">
         <a class="nav-link" href="tanjidlogout.php">Logout (<?php echo $_SESSION['username'] ?>)</a >
      </li> 
              
    </ul>  


  </div>
</nav>
   <div class="py-4">
<section class="my-5">
  
    <div class="py-4">
     
  
 
    <h3 class="text-center">About Us</h3>
  </div>
   </div>
   <div class="py-2" >
  <div class="container-fluid">  
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12"> 
       <img src="img/00000.jpg" class="img-fluid">
    </div>
    
     
     <div class="col-lg-6 col-md-6 col-12"> 
       <h1>Mission</h1>
       <p>Mission
        Making quality products with reasonable pricing and establish trust in digital products among the mass people</p>

        <h1>Vission</h1>
        <p>The vision of My-team is to introduce technology to mass people to help them improve their lifestyle and solve problems in their daily life through digitalization.</p>
    </div>

   </div>
  </div>
</section>

<div class="py-4">
    <div class="py-4">
      
    
      </div>
  </div>
  

<footer class="py-4">
  <p class="p-2 bg-dark text-white text-center">@eShop</p>
   
</footer>

</div>
  </div>
  </div>
  </div>


</body>
</html>