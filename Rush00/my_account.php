<html>
<body>
	<form action="my_account.php" method="post" enctype="multipart/form-data">
	<h1 style="align:center">Logout</h1> <br>
	<td><input type="submit" name="submit" value="Logout"?> </td>
				
</form>
</body>
<html>
<?php
if(isset($_POST['submit'])){
session_start();
session_destroy();

echo "
    <script>window.open('index.php','_self')</script>
";
}
?>