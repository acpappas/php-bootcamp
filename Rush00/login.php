
<html>
<body>
	<form action="login.php" method="post" enctype="multipart/form-data">
				<h2>Please Login or Register</h2> <br>
		Username: <input type="text" name="email" ><br>
		Password: <input type="password" name="password" ><br>
		<input type="submit" name="submit" value="login">
		<h2><a href="create_acc.php">Create Account</a></h2>
	</form>
</body>
<html>
<?php
include ("functions.php");
include ("./includes/db.php");
    
    global $con;
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];
    $sel_c = "SELECT * FROM customers WHERE customer_pass='$c_pass' AND customer_email='$c_email'";
    $run_c = mysqli_query($con, $sel_c);

    $check_cust = mysqli_num_rows($run_c);

    if ($check_cust==0)
    {
        echo "<script>alert('Password or Email incorrect. Please try again.)</script>";
    }

    $ip = getIP();
    $sel_cart = "SELECT * from cart where ip_add='$ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart==0 && $check_cust > 0)
    {
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Success! Logging In.')</script>";
        echo "<script>window.open('order_history.php','_self')</script>";
    }
    else
    {
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Success! Logging In.')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
?>
