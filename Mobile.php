<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
?>
<!DOCTYPE html>
<html>
<head>
	<title>eShop products</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Style css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">


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
        background-color:  ;
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


<div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
   <a class="navbar-brand" href="#"style="color: #a10b6c"><h1>eShop</h1> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">

        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Select category</a>
    <div class="dropdown-menu">
     <a class="dropdown-item" href="index.php">All</a>
      <a class="dropdown-item" href="index.php">All</a>
      <a class="dropdown-item" href="electronic.php">Electronic</a>
      <a class="dropdown-item" href="medicine.php">medicine</a>
      <a class="dropdown-item" href="grocery.php">Grocery</a>
      <a class="dropdown-item" href="Mobile.php">Mobile</a>
      <a class="dropdown-item" href="Men fashion.php">Men fashion</a>
      <a class="dropdown-item" href="Women fashion.php">Women fashion</a>
      <a class="dropdown-item" href="Footwear.php">Footwear</a>
    </div>
    </li>
         
<li class="nav-item">
        <a class="nav-link" href="../showcart.php">Cart</a>
      </li>

     

      <li class="nav-item">

        <a class="nav-link" href="../about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact.php">contact us</a>
      </li>
            
        
    </ul>

    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
      </li>
              
    </ul>  


  </div>
</nav>
<body>
	<div class="container">
		
		<hr>

		<div class="row">

          <?php
      $res=mysqli_query($link,"select * from products where p_status='1' and category_name='Mobile' and category_name='mobile'");
      while($row=mysqli_fetch_array($res))
      {
        $_SESSION['id']=$row["pid"];
       
        ?>
			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="../<?php echo $row["product_image"]; ?>" class="w-100">
						<div class="overlay">
							<div class="detail"><a href="../details.php?bid=<?php echo $row["pid"]; ?>"> <h1> Details </h1></a></div>
						</div>
					</a>
				</div>
				<h5 class="text-center"><?php echo $row["product_name"]; ?></h5>
				<h5 class="text-center">Price: <?php echo $row["product_price"]; ?>(tk)</h5>
				<a href="../cart.php?sid=<?php echo $row["pid"] ?>" class="btn buy">Add to cart</a>
			</div>
			

         <?php
      }
       ?>


		</div>



	</div>

</body>

<footer class="py-4">
  <p class="p-2 bg-dark text-white text-center">@eShop</p>
   
</footer>


</html>