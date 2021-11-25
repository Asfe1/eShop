<?php
session_start();
require("checksession.php");
include_once('connection.php');

// to destroy session
$now=time();
if($now>$_SESSION['end']){
	session_unset();
	session_destroy();
	header('location:everyones view.php');
	exit();
}

$name=$_SESSION['username'];
$query="select p.product_name,p.pid,p.brand_name,p.category_name,p.product_price,r.Date from products p join cart r on (p.pid=r.pid) where r.user_name='$name' and r.flag='0' ";

$result=mysqli_query($con,$query);
$sum = 0;
?>
<head>
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>

<!DOCTYPE html>
<html>
<head>
	<title>eShop</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>




  
</head>
<style media="screen">
      body{
        background-image:linear-gradient(rgba(0,0,0,0.0),rgba(0,0,0,0.0)), url("img/1121.jpg");
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

   <nav class="navbar navbar-expand-lg navbar-dark "  fixed-top" style="background-color: #9e005d;">
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


        <a class="nav-link bold" href="product/index.php">Products</a>
      </li>

<a class="nav-link active" href="showcart.php">
          
          <span><i class="fas fa-shopping-cart"></i>My cart</span>
        </a>

       <li class="nav-item ">
        <a class="nav-link" href="orders/myorders.php">Order History</a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">contact us</a>
      </li>
            
        
    </ul>

    <form class="form-inline my-2 my-lg-0" action="product/search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <a class="nav-link" href="tanjidlogout.php">Logout (<?php echo $_SESSION['username'] ?>)</a >
      </li> 
              
    </ul>  


  </div>
</nav>

</head>
<body>

<div class="py-5">

<div class="container" >
  <div class="py-3"></div> 
  
     
      <h2 align="center" class="text-white bg-dark">Cart</h2>          
    <table class="table table-bordered table-bordered">
  
    <thead>
      <tr>
        <th>Product name</th>
        <th>Brand</th>
        <th>Category</th>
        
         <th>Product_id</th>
          
         <th>Price(TK)</th>
         <th>Date</th>

         <th>Remove item</th>
        
     
      </tr>
    </thead>
    <tbody>
      <?php 
       
        while($rows=mysqli_fetch_assoc($result))
        {
          
      ?>
          <tr>
            <td><?php echo $rows['product_name'] ?></td>
            <td><?php echo $rows['brand_name'] ?></td>
            <td><?php echo $rows['category_name'] ?></td>
             
             <td><?php echo $rows['pid'] ?></td>
              
             <td><?php echo $rows['product_price'] ?></td>
             <td><?php echo $rows['Date'] ?></td>

             <td><button type="button"  class="btn btn-danger"><a href="deletefromcart.php?pid= <?php echo $rows['pid']; ?>"class="text-white">Remove</a> </button></td>

              <?php  

           # $add = 1;
          
          $price = $rows['product_price'];
          $sum += $price;
           
          ;
             
             ?>
          </tr>


          <?php 
        }
       ?>
       
    </tbody>
  </table>
</div>


</div>

 <footer class="py-4">
  <p class="text-center">
   
             <td><button type="button"  class="btn btn-success"><a href="paymentsuccess.php?price=<?php echo $sum?> "class="text-white">Pay now</a> </button>

              <h2><p class="font-weight-bold text-center text-dark"><?php echo "Total = $sum tk" ?></p></h2>
             </td>

              

  </p>
</footer> 
</body>
</html>