
<?php
  session_start();
  require("checksession.php");
  // if(!isset($_SESSION['username']))
  // {
    // header('location:login.php');
  // }
?>

<!DOCTYPE html>
<html>
<head>
  <title>eShop admin</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  
</head>
<style >
 body{
        background-image:linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url("img/00000.jpg");
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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"style="color: #a10b6c"><h1>eShop</h1> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

        <a class="nav-link" href="adminhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">

        <a class="nav-link" href="product.php">Products<span class="sr-only">(current)</span></a>
      </li>

      

<li class="nav-item">
        <a class="nav-link" href="orders/newordershow.php">New Orders</a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="orders/deliveredorders.php">Delivered orders</a>
      </li>

     
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Users</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="message.php">Message</a>
      <a class="dropdown-item" href="orders/productreview.php">Comments</a>
      <a class="dropdown-item" href="allusers.php">All users</a>
    </div>
  </li>
            
        
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <li class="nav-item">
        <a class="nav-link" href="tanjidlogout.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
      </li>
              
    </ul>  


  </div>
</nav>





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







  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>
