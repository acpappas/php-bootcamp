<?php

$con = mysqli_connect("localhost","root", "connect","minishop");

if (mysqli_connect_errno()){
  echo "The Connection was not established: " . mysqli_connect_error();
}
// getting user ip address
function getIP() {
$ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

return $ip;

}
//creating shopping cart
function cart(){
  global $con;
  
  if(isset($_GET['add_cart'])){
    $pro_id = $_GET['add_cart'];
    $ip = getIP();
    $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
    $run_check = mysqli_query($con, $check_pro);
    if(mysqli_num_rows($run_check)>0){
      echo "";
    }

    else {
      $insert_pro = "INSERT INTO cart (p_id,ip_add, qty) VALUES ('$pro_id','$ip',0)";
      $res = mysqli_query($con, $insert_pro);
       echo "<script>window.open('index.php','_self)</script>";
   }
   mysqli_close($con);
  }


}

//getting total added items

function total_items(){
 
  if (isset($_GET['add_cart'])){
   
    global $con;
    $ip = getIP();
    $get_items = "select * from cart where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
  }
    
  else {
      global $con;

      $ip = getIP();
  
      $get_items = "select * from cart where ip_add='$ip'";
  
      $run_items = mysqli_query($con, $get_items);
  
      $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
  }

// Getting the total price of the cart

function total_price(){
  
  $total = 0;

  global $con;

  $ip = getIP();

  $t_price = "select * from cart where ip_add='$ip'";
  $run_price = mysqli_query($con, $t_price);

  while($p_price=mysqli_fetch_array($run_price)){
    $pro_id = $p_price['p_id'];

    $pro_price = "select * from products where product_id='$pro_id'";

    $run_pro_price = mysqli_query($con,$pro_price);

    while ($pp_price = mysqli_fetch_array($run_pro_price)){
      
      $product_price = array($pp_price['product_price']);

      $values = array_sum($product_price);

      $total += $values;
    }

  }
  echo "R" . $total;
}

//display products from category
function showCats(){
    
    global $con;
    
    $get_cats= 'SELECT * FROM categories';
    
    $run_cats = mysqli_query($con, $get_cats);
    
    while ($row_cats = mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_text = $row_cats['cat_text'];
    
    echo "<li><a href='index.php?cat=$cat_id'>$cat_text</a></li>";
    }
}
//display products from genre

 function showGenres(){
    
    global $con;
    
   $get_genres = "select * from genres";
    
    $run_genres = mysqli_query($con, $get_genres);
    
  while ($row_genres = mysqli_fetch_array($run_genres)){
  $genre_id = $row_genres['genre_id'];
  $genre_text = $row_genres['genre_text'];
    
  echo "<li><a href='index.php?genre=$genre_id'>$genre_text</a></li>";
  }
    
 }
  
 //display random products on home page

function getPro(){
  
  if(!isset($_GET['cat'])){
    if(!isset($_GET['genre'])){
  
  
  global $con;

  $get_pro = "select * from products order by RAND() LIMIT 0,6";

  $run_pro = mysqli_query($con, $get_pro);

  while($row_pro=mysqli_fetch_array($run_pro)){
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_author = $row_pro['product_author'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];

    echo"<div id='single_product'>

        <h3>$pro_title<h3>
        <img src='admin_area/product_images/$pro_image' width='180' height='250' />
        <p>$pro_author</p><br/>
        <p>R$pro_price.00</p><br/>
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='index.php?add_cart=$pro_id'><button style='flaot:right'>Add to Cart</button></a>
</div>";
  }
}
}
}

function getCatPro(){
  
  if(isset($_GET['cat'])){
    
  $cat_id = $_GET['cat'];
   
  global $con;

  $get_cat_pro = "select * from products where product_cat='$cat_id'";

  $run_cat_pro = mysqli_query($con, $get_cat_pro);

  $count_cats = mysqli_num_rows($run_cat_pro);

  if($count_cats==0){
    echo "<h2>There are no products in this category!</h2>";
  }

  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
    $pro_id = $row_cat_pro['product_id'];
    $pro_title = $row_cat_pro['product_title'];
    $pro_author = $row_cat_pro['product_author'];
    $pro_price = $row_cat_pro['product_price'];
    $pro_image = $row_cat_pro['product_image'];


      echo"<div id='single_product'>

        <h3>$pro_title<h3>
        <img src='admin_area/product_images/$pro_image' width='180' height='250' />
        <p>$pro_author</p><br/>
        <p>R$pro_price.00</p><br/>
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='index.php?add_cart=$pro_id'><button style='flaot:right'>Add to Cart</button></a>
</div>";
    }
  }
}

function getTypePro(){
  
  if(isset($_GET['genre'])){
    
  $genre_id = $_GET['genre'];
   
  global $con;

  $get_type_pro = "select * from products where product_type='$genre_id'";

  $run_type_pro = mysqli_query($con, $get_type_pro);

  $count_types = mysqli_num_rows($run_type_pro);

  if($count_types==0){
    echo "<h2>There are no products in this Genre!</h2>";
  }

  while($row_type_pro=mysqli_fetch_array($run_type_pro)){
    $pro_id = $row_type_pro['product_id'];
    $pro_title = $row_type_pro['product_title'];
    $pro_author = $row_type_pro['product_author'];
    $pro_price = $row_type_pro['product_price'];
    $pro_image = $row_type_pro['product_image'];


      echo"<div id='single_product'>

        <h3>$pro_title<h3>
        <img src='admin_area/product_images/$pro_image' width='180' height='250' />
        <p>$pro_author</p><br/>
        <p>R$pro_price.00</p><br/>
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='index.php?add_cart=$pro_id'><button style='flaot:right'>Add to Cart</button></a>
</div>";
    }
  }
}
?>