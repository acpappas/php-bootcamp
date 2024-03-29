<!DOCTYPE html>
<?php
session_start();
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
        <?php cart();?>
        <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
            Welcome Guest!
            <b style="color:aliceblue">Shopping Cart: </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:aliceblue">Go to Cart</a>
        </span>

        </div>
        <div id="products_box">
      <form action="" method="post" enctype="multipart/form-data">

        <table align="center" width="700" bgcolor="orange">

            <tr align="center">
                <th>Remove</th>
                <th>Product(s)</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
            <?php
                global $con;
                $total = 0;
                $ip = getIP();
              
                $sel_price = "select * from cart where ip_add='$ip'";
                $run_price = mysqli_query($con, $sel_price);
                while($p_price=mysqli_fetch_array($run_price)){
                    
                    $pro_id = $p_price['p_id'];
              
                  $pro_price = "select * from products where product_id='$pro_id'";
              
                  $run_pro_price = mysqli_query($con,$pro_price);
                  

                  while ($pp_price = mysqli_fetch_array($run_pro_price)){
                    $product_price = array($pp_price['product_price']);
                    $product_title = $pp_price['product_title'];
                    $product_image = $pp_price['product_image'];
                    $single_price = $pp_price['product_price'];
                    $values = array_sum($product_price);
                    $total += $values;
            ?>
        

          <tr align="center">
                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
                <td><?php echo $product_title; ?><br>
           <img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
        </td>
                <td><input type="text" size="5" name="qty" value="<?php echo $_SESSION['qty'];?>" /></td>

                <td><?php echo "R" . $single_price; ?> </td>
                <?php
                    global $con;
                    if (isset($_POST['update_cart'])) {
                    $qty = $_POST['qty'];
                    $update_qty = "update cart set qty='$qty'";
                    $run_qty = mysqli_query($con, $update_qty);
                    $_SESSION['qty'] = $qty;
                    $total = $total*$qty;
                    }
                    ?>
            </tr> 
            <?php } } ?>
            <tr align="right"> 
                <td colspan="5"><b>Sub Total: </b></td>
                <td><?php echo "R" . $total; ?></td>
            </tr>
            <tr align="center">
            <td><input type="submit" name="update_cart" value="Update Cart"?> </td>
            <td><input type="submit" name="continue" value="Continue"?></td>
            <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</button></a> </td>
            </tr>
            </table>
             </form>
             <?php
             function remove_from_cart(){
             global $con;
             $ip = getIP();
             if (isset($_POST['update_cart'])) {
                 if (isset($_POST['remove'])) {
                     foreach($_POST['remove'] as $remove_product) {
                         $delete_product = "delete from cart where p_id='$remove_product' AND ip_add='$ip'";
                         $run_delete = mysqli_query($con, $delete_product);
                         echo (mysqli_error($con));
                         if ($run_delete) {
                             echo "<script>window.open('cart.php','_self')</script>";
                         }
                     }
                 }
             }
             if (isset($_POST['continue'])) {
                 echo "<script>window.open('index.php','_self')</script>";
             }
            }
        echo @$up_cart = remove_from_cart();
         ?>
         </div>
    </div>
    </div>
<div id = "footer">
        <h2 style="text-align:right; padding-top:30px;"> &copy; 2019 </h2> </div>    
</body>
    <html>