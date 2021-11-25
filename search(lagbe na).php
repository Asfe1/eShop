


<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
$value = $_POST['value'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WOWBOOK</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="">
</head>
<body>
  <header class="header">
   <div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Inventory</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">

        <a class="nav-link" href="cards.php">Products</a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="">Order list</a>
      </li>

      <li class="nav-item">

        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">contact us</a>
      </li>
            
        
    </ul>

   <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input class="form-control mr-sm-2" required name="value" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <li class="nav-item">
        <a class="nav-link" href="everyones view.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
      </li>
              
    </ul>  

  </div>
</nav>
  </header>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <?php
      $res=mysqli_query($link,"select * from products where category_name='$value' or brand_name='$value' or product_name like '%$value%' ");
      while($row=mysqli_fetch_array($res))
      {
        $_SESSION['id']=$row["pid"];
        //echo $_SESSION['id'];
        ?>

        <div class="col-sm-6 col-md-3">
          <div class="product">
            <div class="img-box">
              <img src="<?php echo $row["product_image"]; ?>" alt="book">
            </div>
            <div class="details">
              <h2 name="bookname"><?php echo $row["product_name"]; ?><br> <span><?php echo $row["brand_name"]; ?></span></h2>
            
              <label for="">Description</label>
              <p><?php echo $row["product_details"]; ?></p>
              <a href="details.php?bid=<?php echo $row["pid"]; ?>">Details</a>
            </div>
            <div class="price">TK:<?php echo $row["product_price"]; ?></div>
          </div>
        </div>
        <?php
      }
       ?>
    </div>
  </div>

</body>
</html>
