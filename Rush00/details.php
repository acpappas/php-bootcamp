<!DOCTYPE html>
<?php
include("functions.php");
?>
<html>
    <head>
        <title>This is a Shop</title>

        <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
        <div class="main wrapper">
    <div class=header_wrapper>
        </div>
        <div class="menu_bar">
        <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="create_acc.php">Sign up</a></li>
                <li><a href="my_account.php">My Account</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search"/>
                <input type="submit" name="search" value="Search"/>
            </form>
            </div>
        </div>
    
</div>

    <div class="content_wrapper">
    <div id="sidebar"> 
        <div id="sidebar_title">Categories</div>
        <ul id ="cats">
               <?php showCats();?>
            </ul>
        <div id="sidebar_title">Genres</div>
        <ul id ="cats">
              <?php showGenres();?>
        </ul>
    </div>
    <div id="content_area">
        <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
            Welcome Guest!
            <b style="color:aliceblue">Shopping Cart: </b> Total Items: Total Price: <a href="cart.php" style="color:aliceblue">Go to Cart</a>
        </span>

        </div>
        <div id="products_box">
       <?php
        
    if(isset($_GET['pro_id'])){

    $product_id  = $_GET['pro_id'];

  $get_pro = "select * from products where product_id='$product_id'";

  $run_pro = mysqli_query($con, $get_pro);

  while($row_pro=mysqli_fetch_array($run_pro)){
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_author = $row_pro['product_author'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];
    $pro_desc = $row_pro['product_desc'];

    echo"<div id='single_product'>

        <h3>$pro_title<h3>
        <img src='admin_area/product_images/$pro_image' width='auto' height='auto'/>
        <h4>$pro_author<h4>
        <h5>$pro_type<h5>
        <h6>$pro_price<h6>
        <p><b> $pro_desc </b></p>
        <a href='index.php' style='float:left;'>Go Back</a>
        <a href='index.php?pro_id=$pro_id'><button style='flaot:right'>Add to Cart</button></a>
</div>";
  }
}
?>
        </div>
    </div>
    </div>

    <div id = "footer">
        <h2 style="text-align:right; padding-top:30px;"> &copy; 2019 </h2> </div>    
</body>
    <html>