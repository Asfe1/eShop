</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
</head>
<body class="container">
  <h1 class="text-center text-danger mb-5" 
  style="font-family: 'Abril Fatface', cursive;"> ONLINE SHOPPING CART PHP MYSQLI</h1>

  <div class="row">
 <div class="container" style="width:700px;"> 
  <?PHP

  session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"inventory");
  // if($con){
  //  echo "connection succussful";
  // }else{
  //  echo "no connection";
  // }

  
   

      $res=mysqli_query($link,"select * from products");
      while($row=mysqli_fetch_array($res))

    {
      ?>
      
    <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["product_image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>  
                               <h4 class="text-danger">TK: <?php echo $row["product_price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
</div>

  <?php   
    }
  
  ?>


</div>
</body>
</html>