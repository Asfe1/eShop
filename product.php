<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}


set_error_handler("customError");

session_start();
include_once("db/connect.php");
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}
include("db/connect.php");
$edit_mode = false;
$edit_id   = '';
if (isset($_POST['edit_product'])) {
    $edit_mode = true;
    $edit_id   = $_POST['product_id'];
}
$msg="";
$css_class="";
 if (isset($_POST['add_products'])) {


  $fnm=$_FILES["image"]["name"];
  $dst="./product_image/".$fnm;
  $dst1="image/".$fnm;
  move_uploaded_file($_FILES["image"]["tmp_name"],$dst);


          $sql_prod = "INSERT INTO `products` (  `category_name`,`brand_name`,`product_name`,`product_price`,
                `product_stock`,`product_details`, `added_date`, `p_status`, `product_image`)
                VALUES('" . $_POST['category_name'] . "','" . $_POST['brand_name'] . "','" . $_POST['product_name'] . "','" . $_POST['product_price'] . "','" . $_POST['product_stock'] . "','" . $_POST['product_details'] . "', now(), 1,'$dst')";


          $res_prod = $conn->query($sql_prod);
          mysqli_close($conn);
          if (!$res_prod) {
           
              echo "<script>
                               alert('Something went wrong.');
                               window.location.href='product.php';
                           </script>";
          } else {
          

              echo "<script>
                               alert('Product Added Successfully');
                               window.location.href='product.php';
                           </script>";
          }
  
   
   }  

    

include("db/connect.php");
if (isset($_POST['save_product'])) {
     $cat_name         = 'category_name_' . $_POST['product_id_to_save'];
     $brand_name         = 'brand_name_' . $_POST['product_id_to_save'];
    $pro_name         = 'product_name_' . $_POST['product_id_to_save'];
    $pro_price        =  'product_price_'.$_POST['product_id_to_save'];
    $pro_stock        = 'product_stock_' . $_POST['product_id_to_save'];
    $pro_details       = 'product_details_' . $_POST['product_id_to_save'];
    $pro_status       = 'product_status_' . $_POST['product_id_to_save'];
     $pro_file      = 'product_image_' . $_POST['product_id_to_save'];
    
     $fnm=$_FILES["$pro_file"]["name"];
  $dst="./product_image/".$fnm;
  $dst1="image/".$fnm;
  move_uploaded_file($_FILES["$pro_file"]["tmp_name"],$dst);

     $cat_name_value   = '';
    $brand_name_value   = '';
    $pro_name_value   = '';
    $pro_price_value   = '';
    $pro_stock_value   = '';
    $pro_details_value   = '';
    $pro_status_value = '';
    $pro_file_value = '';
    
    $keys             = array_keys($_POST);
    $values           = array_values($_POST);
    for ($i = 0; $i < sizeof($keys); $i++) {
        if ($keys[$i] == $cat_name) {
            $cat_name_value = $values[$i];
        }
        if ($keys[$i] == $brand_name) {
            $brand_name_value = $values[$i];
        }
        if ($keys[$i] == $pro_name) {
            $pro_name_value = $values[$i];
        }
        if ($keys[$i] == $pro_price) {
            $pro_price_value = $values[$i];
        }
        if ($keys[$i] == $pro_stock) {
            $pro_stock_value = $values[$i];
        }
        if ($keys[$i] == $pro_details) {
            $pro_details_value = $values[$i];
        }
        if ($keys[$i] == $pro_status) {
            $pro_status_value = $values[$i];
        }
        
        
    }
  $sql = "UPDATE products SET product_name='" . $pro_name_value . "',category_name='" . $cat_name_value . "',brand_name='" . $brand_name_value . "',product_price='" . $pro_price_value . "',product_stock='" . $pro_stock_value . "',product_details='" . $pro_details_value . "', p_status= '".$pro_status_value."', product_image='".$dst."'  WHERE pid = '" . $_POST['product_id_to_save'] . "';";
   
    $res = $conn->query($sql);
    mysqli_close($conn);
    if (!$res) {
         echo "<script>
                          alert('Something went wrong.');
                          window.location.href='product.php';
                      </script>";
      set_error_handler("customError");
    } else {
        echo "<script>
                         alert('Products Updated Successfully');
                         window.location.href='product.php';
                     </script>";
    }
  
    include("db/connect.php");
}
   
?>
    <!DOCTYPE html>
    <html>
      <div py-5>
      
    </div>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inventory Management </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="./js/main.js"></script>
        <link rel="stylesheet" type="text/css" href="homedesign.css">
    </head>

    <style media="screen">
      body{
        background-color:  #e6f9ff;
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
        <!-- <header> -->
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Eshop Inventory</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">

        <a class="nav-link" href="adminhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">

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
<div class="py-3">
  
</div>


        <!-- </header> -->
        <br>
        <br>
        <div class="wrapper" class="py-5">
            <div class="container-fluid" class="py-5">
                <form action='' method='post' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header clearfix">
                                <h2 class="pull-left"> Details</h2>
                                <?php
                        include_once("db/connect.php");
                   if ($edit_mode) {
                            echo "<input type='hidden' name='product_id_to_save' value='" . $edit_id . "'/><button type='submit' name='save_product' class='btn btn-success pull-right'><i class='fa fa-save'></i>Save</button>
                                                                       ";
                        } else {
                            echo '<a href="#" data-toggle="modal" data-target="#createProduct" class="btn btn-success pull-right">Add New Product</a>';
                        }
                        ?>
                            </div>
                            <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <!-- ............... -->
                                            <form action="" method="post" onsubmit="return true" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" requride name="product_name" placeholder="Enter product name" autocomplete="off">
                                                    <small id="cat_error" class="form-text text-muted"></small>
                                                </div>
                                                
                                                  <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" class="form-control" requride name="category_name" placeholder="Enter category">
                                                    <small id="cat_error" class="form-text text-muted"></small>
                                                  </div>
                                               <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <input type="text" class="form-control" requride name="brand_name" placeholder="Enter brand">
                                                    <small id="cat_error" class="form-text text-muted"></small>
                                                  </div>
                                                
                                                <div class="form-group">
                                                    <label>Product Price</label>
                                                    <input type="text" class="form-control" requride name="product_price" placeholder="Enter Price of Product" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" class="form-control" requride name="product_stock" placeholder="Enter Quantity" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Details</label>
                                                    <textarea name="product_details" rows="4" cols="30">
                                                    </textarea>
                                                </div>
                                                 <div class="form-group">
                                                <?php // <img src="images/placeholder.png" id=""> ?>
                                                  <label for="image">Image </label>
                                                    <input type="file" name="image" id="image">
                                                   </div>

                                                <button type="submit" name="add_products" class="btn btn-primary">Submit</button>
                                            </form>
                                            <!-- ................ -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <?php
           
                    

              $sql = "SELECT * FROM products ORDER by pid";
              if ($result = mysqli_query($conn, $sql)) {
                  if (mysqli_num_rows($result) > 0) {
                      echo "<table class='table table-bordered table-striped'>";
                      echo "<thead>";
                      echo "<tr>";
                      echo "<th>#</th>";
                      echo "<th  style='width: 180px;'>Product</th>";
                      echo "<th>Image</th>";
                      echo "<th  style='width: 180px;'>Category</th>";
                      echo " <th style='width: 180px;'>Brand</th>";
                      echo "<th>Price</th>";
                      echo "<th>Stock</th>";
                      echo "<th>Details</th>";
                      echo "<th>Added Date</th>";
                     
                      echo "<th>Status</th>";
                      echo "<th>Action</th>";
                      echo "</tr>";
                      echo "</thead>";
                  
                      echo "<tbody>";
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<tr>";
                          echo '<td>' . $row['pid'] . '</td>';
                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="product_name_' . $row['pid'] . '" value="' . $row['product_name'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['product_name'] . '</td>';
                          }

                           if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="file" name="product_image_' . $row['pid'] . '" value="' . $row['product_image'] . '" /></td>';
                          } else {
                              echo '<td><img src="' . $row['product_image'] . '" width="200" height="200" ></td>';
                          }
                         
                           if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="category_name_' . $row['pid'] . '" value="' . $row['category_name'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['category_name'] . '</td>';
                          }
                          //brand
                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="brand_name_' . $row['pid'] . '" value="' . $row['brand_name'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['brand_name'] . '</td>';
                          }

               
                          // price

                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="product_price_' . $row['pid'] . '" value="' . $row['product_price'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['product_price'] . '</td>';
                          }

                          // quantity

                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="product_stock_' . $row['pid'] . '" value="' . $row['product_stock'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['product_stock'] . '</td>';
                          } 

                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><input type="text" name="product_details_' . $row['pid'] . '" value="' . $row['product_details'] . '" /></td>';
                          } else {
                              echo '<td>' . $row['product_details'] . '</td>';
                          } 
                          // date
                          echo '<td>' . $row['added_date'] . '</td>';
                          if ($edit_mode && $edit_id == $row['pid']) {
                              echo '<td><select name="product_status_' . $row['pid'] . '"><option value="">--select status--</option><option value="1">Active</option><option value="0">Inactive</option>        </select></td>';
                          } else {
                              if ($row['p_status'] == 1) {
                                  echo "<td>Active</td>";
                              } else {
                                  echo "<td>Inactive</td>";
                              }
                          }
                          echo "<td>";
                          echo "<form action='' method='post'>
                                                       <input type='hidden' name='product_id' value='" . $row['pid'] . "'/>
                                                       <button type='submit' name='edit_product' style='border: none; -webkit-appearance: none;'><i class='fa fa-pencil-square-o'></i>Edit</button>
                                                      </form>";
                          echo '';
                          echo "</td>";
                          echo "</tr>";
                      }
                      echo "</tbody>";
                      echo "</table>";
                    
                      mysqli_free_result($result);
                  } else {
                      echo "<p class='lead'><em>No records were found.</em></p>";
                  }
              } else {
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
              }
            
              mysqli_close($conn);
              ?>


                    </div>
                </form>
            </div>
        </div>
        </div>
    </body>

    </html>