<?php
  session_start();
  if(!isset($_SESSION['username']))
  {
    header('location:../everyones view.php');
  }
  include_once('../connection.php');
  $name=$_SESSION['username'];
   $query="select r.cid, r1.name,r1.mobile_no,p.product_name,p.pid,p.brand_name,p.category_name,p.product_price,r.confirmation,r.delevery,r.Date from products p join cart r on (p.pid=r.pid) join registration r1 on (r1.name=r.user_name)  where r.delevery='no'";
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
  <a class="navbar-brand" href="#">Eshop Inventory</a>

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

      

<li class="nav-item active">
        <a class="nav-link" href="newordershow.php">New Orders</a>
      </li>

    

      <li class="nav-item">
        <a class="nav-link" href="deliveredorders.php">Delivered orders</a>
      </li>

     
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Users</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../message.php">Message</a>
      <a class="dropdown-item" href="productreview.php">Comments</a>
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
   <h2 align="center" class="text-white ">New Orders</h2>    
          
  <table class="table table-bordered table-dark">
    <thead>
      <tr>
          <th>Username</th>
          <th>Mobile</th>
         <th>Date</th>
        <th>Product name</th>
        <th>Category</th>
        <th>Brand</th>
         <th>Product_id</th>
         <th>Price(TK)</th>
         <th>Corfirmation</th>
          <th>Delevery</th>
          <th>Action</th>
          <th>Action</th>

         
       
      </tr>
    </thead>
    <tbody>
      <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
      ?>
          <tr>
            <td><?php echo $rows['name'] ?></td>
            <td><?php echo $rows['mobile_no'] ?></td>
             <td><?php echo $rows['Date'] ?></td>
            <td><?php echo $rows['product_name'] ?></td>
            <td><?php echo $rows['category_name'] ?></td>
             <td><?php echo $rows['brand_name'] ?></td>
             <td><?php echo $rows['pid'] ?></td>
             <td><?php echo $rows['product_price'] ?></td>
              <td><?php echo $rows['confirmation'] ?></td>
               <td><?php echo $rows['delevery'] ?></td>

               <td><button type="button"  class="btn btn-info"><a href="confirmation.php? cid=<?php echo $rows['cid'];?>"class="text-white">Confirm</a> </button></td>
 
              <td><button type="button"  class="btn btn-info"><a href="delever.php ? cid=<?php echo $rows['cid'];?>"class="text-white">Deliver</a> </button></td>

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