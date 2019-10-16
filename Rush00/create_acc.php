<!DOCTYPE html>
<?php
session_start();
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
        <?php
$servername = "localhost";
$username = "root";
$password = "connect";

// Create connection
$con = new mysqli($servername, $username, $password, "minishop");

 //if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
// }
//echo "Connected successfully";
if ($_POST['register'] == "Create My Account")
{
	$ip = getIP();

	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = ($_POST['c_pass']);
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	
	move_uploaded_file($c_image_tmp, "customer/c_images/$c_image");
	$insert_c = "INSERT INTO customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip)VALUES('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$ip')";
	$insert_res = mysqli_query($con, $insert_c);
  // echo (mysqli_error($conn));
	$sel_cart = "select * from cart where ip_add='$ip'";
	$insert_res = mysqli_query($con, $sel_cart);
	$check_cart = mysqli_num_rows($insert_res);

	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script>window.open('index.php','_self')</script>";
	}

	else
	{
		$_SESSION['customer_email']=$c_email;
		echo "<script>window.open('checkout.php','_self')</script>";
	}


}
?>
        <form action="create_acc.php" method="post" enctype="multipart/form-data">
	<table align="center" width="750">
		<tr align="center">
			<td colspan="6"><h2>Create an Account</h2></td>
		</tr>
		<tr align="center">
			<td colspan="6">* means it is a required field</td>
		</tr>
		<tr>
			<td align="right">*Full Name</td>
			<td><input type="text" name="c_name" required/></td>
		</tr>
		<tr>
			<td align="right">*Email Address:</td>
			<td><input type="text" name="c_email"required/></td>
		</tr>
		<tr>
			<td align="right">*Password:</td>
			<td><input type="password" name="c_pass"required/></td>
		</tr>
		<tr>
			<td align="right">Profile Picture:</td>
			<td><input type="file" name="c_image"/></td>
		</tr>
		<tr>
			<td align="right">*Country of Residence:</td>
			<td>
			<select name="c_country">
				<option>Select a Country:</option>
				<option>South Africa</option>
				<option>Lesotho</option>
				<option>Namibia</option>
				<option>Bostwana</option>
				<option>Mozambique</option>
				<option>Zimbabwe</option>
				<option>Madagascar</option>
			</select>
			</td>
		</tr>
		<tr>
			<td align="right">*City of Residence:</td>
			<td><input type="text" name="c_city"required/></td>
		</tr>
		<tr>
			<td align="right">*Contact Number:</td>
			<td><input type="text" name="c_contact"required/></td>
		</tr>
		<tr>
			<td align="right">*Address for delivery:</td>
			<td><input type="text" name="c_address"required></td>
		</tr>
		<tr align="center">
			<td colspan="6"><input type="submit" name="register" value="Create My Account"></td>
		</tr>
	</table>	
</form>
        </div>
    </div>
    </div>

    <div id = "footer">
    <h3 style="text-align: right; padding-top: 40px;">&copy; 2019 by Pick-a-Book</h3>    
</body>
    <html>