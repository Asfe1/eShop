
<?php
  session_start();
  if(!isset($_SESSION['username']))
  {
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html>
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
      <li class="nav-item active">

        <a class="nav-link" href="adminhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">

        <a class="nav-link" href="">Products</a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="">Order list</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Edit item</a>
      </li>
     
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Users</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="message.php">Message</a>
      <a class="dropdown-item" href="dpfrom.php">Comments</a>
      <a class="dropdown-item" href="allusers.php">All users</a>
    </div>
  </li>
            
        
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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






  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>


<div class="title2">

  <h1 class="py-5">Managing Inventory</h1>
</div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>
