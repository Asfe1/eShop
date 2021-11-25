<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
   $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cards.php"</script>';  
           }  
  }



  else
  {
   $item_array =array(

       'item_id' => $_GET["pid"],
     'item_name'               =>     $_POST["hidden_name"],  
    'item_price'          =>     $_POST["hidden_price"],  
      'item_quantity'          =>     $_POST["quantity"] 

   );
   $_SESSION["shopping_cart"][0]=$item_array;
   
  }
}

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cards.php"</script>';  
                }  
           }  
      }  
 } 
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

   
  <br>
  <br>

    <link rel="stylesheet" type="text/css" href="css/card.css">
    
    <div class="py-5">
<meta name="viewport" content="width=device-width, initial-scale=1">
        
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
    <form method="post" action="cards.php?action=add&id=<?php echo $row["pid"]; ?>">  
    <div class="product-tumb">
      <img src="<?php echo $row["product_image"]; ?>" alt="">
    </div>
    <div class="product-details">
      <span class="product-catagory"><?php echo $row["product_name"]; ?></span>
      <h4><a href=""></a></h4>
      <div class="product-bottom-details">
        <div class="product-price"><?php echo $row["product_price"]; ?></div>
        <div class="product-links">
          
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  

        </div>
      </div>
      <a href="rivews.php?bid=<?php echo $row["pid"]; ?>">Details</a>
    </div>
  </div>


 

        <?php
      }
       ?>

    </div>
  </div>
   </div>

   <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cards.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 
    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
