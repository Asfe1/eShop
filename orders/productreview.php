<?php
  session_start();
  if(!isset($_SESSION['username']))
  {
    header('location:../everyones view.php');
  }
  include_once('../connection.php');
  $name=$_SESSION['username'];
   $query="select * from review";
$result=mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  meta charset="utf-8">
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
        background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url("../img/g.jpg");
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
  <a class="navbar-brand" href="#">Inventory</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">

        <a class="nav-link" href="../adminhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">

        <a class="nav-link" href="../product.php">Products<span class="sr-only">(current)</span></a>
      </li>

      

<li class="nav-item ">
        <a class="nav-link" href="newordershow.php">New Orders</a>
      </li>

    

      <li class="nav-item ">
        <a class="nav-link" href="deliveredorders.php">Delivered orders</a>
      </li>

     
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Users</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../message.php">Message</a>
      <a class="dropdown-item active" href="productreview.php">Comments</a>
      <a class="dropdown-item" href="../allusers.php">All users</a>
    </div>
  </li>
            
        
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">

       <li class="nav-item">
        <a class="nav-link" href="../tanjidlogout.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
      </li>
              
    </ul>  


  </div>
</nav>

</head>
<body>

<div class="py-5">

<div class="container" >

  <div class="py-4"></div>
   <h2 align="center" class="text-white bg-dark ">Product Reviews</h2>    
     <table class="table table-bordered table-dark">
    <thead>
      <tr>
          <th>Username</th>
         
        
        
         <th>Product_id</th>
         
         
          <th>Comment</th>

          <th>action</th>

          

         

         
       
      </tr>
    </thead>
    <tbody>
      <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
      ?>
          <tr>
            <td><?php echo $rows['user_name'] ?></td>
            <td><?php echo $rows['pid'] ?></td>
             <td><?php echo $rows['comment'] ?></td>
             <td><button type="button"  class="btn btn-info"><a href="remove.php?pid= <?php echo $rows['rid']; ?>"class="text-white">Delete</a> </button></td>
          </tr>

           
                    
          <?php 
        }
       ?>
       
    </tbody>
  </table>
</div>


</div>


</body>
</html>