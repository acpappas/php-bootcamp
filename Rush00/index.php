<!DOCTYPE html>
<?php
include("functions.php");
?>
<html>
    <head>
        <title>Home - Pick-a-Book</title>

        <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
        <div class="main wrapper">
    <div class=header_wrapper>
    <div class="container">
			<div class="header">
				<img id="banner" src="images/banner.jpg" /> <br/>
				<img id="name" src="images/name.jpg" />
			</div>
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
            <b style="color:aliceblue">Shopping Cart: </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:aliceblue">Go to Cart</a>
        </span>

        </div>
        <div id="products_box">
            <?php cart(); ?>
            <?php getPro(); ?>
            <?php getCatPro(); ?>
            <?php getTypePro(); ?>
        </div>
    </div>
    </div>

    <div id = "footer">
    <h3 style="text-align: right; padding-top: 40px;">&copy; 2019 by Pick-a-Book</h3>    
</body>
    <html>