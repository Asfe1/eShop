<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

  

</head>
<body>
  <div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Inventory</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">

        <a class="nav-link" href="adminhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">

        <a class="nav-link" href="cards.php">Products</a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="">Order list</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Edit item</a>
      </li>
     
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#">Users</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="message.php">Message</a>
      <a class="dropdown-item" href="#">Comments</a>
      <a class="dropdown-item active" href="#">All users</a>
    </div>
  </li>


      
            
        
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

               
    </ul>  


  </div>
</nav>








   
  <br>
  <br>

    <link rel="stylesheet" type="text/css" href="css/card.css">
    
    <div class="py-5">

        
  <div class="container" class="py-5">
    <div class="row">
      <?php
      $res=mysqli_query($link,"select * from products");
      while($row=mysqli_fetch_array($res))
      {
        $_SESSION['id']=$row["pid"];
        //echo $_SESSION['id'];
        ?>
      
        <div class="product-card">
   
    <div class="product-tumb">
      <img src="<?php echo $row["product_image"]; ?>" alt="">
    </div>
    <div class="product-details">
      <span class="product-catagory"><?php echo $row["product_name"]; ?></span>
      <h4><a href=""></a></h4>
      <div class="product-bottom-details">
        <div class="product-price"><?php echo $row["product_price"]; ?></div>
  




      </div>
    </div>
  </div>


 
        
  

        <?php
      }
       ?>




    </div>
  </div>
   </div>
    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
