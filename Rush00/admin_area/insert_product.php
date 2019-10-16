<?php
include("admin_functions.php");

?>
<html>
    <head>
        <title>Add Products</title>
        
    <style>
        table{
            background-color: rgba(219, 127, 103, 1);
            width: 50%;
            height: 50%;
        }
        table, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: center;    
        }
        body{
            background-color: rgba(228, 230, 195, 1);
        }
        </style>
    </head>
    <body>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">

            <table align="center">
            <th colspan="2">Insert New Product Here</th>
            <tr>
                <td>Product Title:</td>
                <td> 
                <input type="text" name="product_title" required />
            </td>
            </tr>
            <tr>
                <td>Product Category:</td>
              <td>
                  <select name="product_cat"required>
                   <option>Select a Category</option>
                    <?php getCats(); ?>
               </select> 
            </td>
        </tr>   
        <tr>
                <td>Product Genre:</td>
              <td>
                  <select name="product_type"required>
                   <option>Select a Genre</option>
                    <?php getGenres(); ?>
               </select> 
            </td>
            </tr>
             <tr>
                <td>Product Author:</td>
                <td> 
                <input type="text" name="product_author" required />
            </td>

            </tr>
             <tr>
                <td>Product Price:</td>
                <td> <input type="text" name="product_price" required/></td>
             </tr>

            <tr>
                <td>Product description:</td>
                <td><textarea name="product_desc" cols="20" rows="10"></textarea></td>

            </tr>

            <tr>
                <td>Product image:</td>
                <td><input type="file" name="product_image" required/></td>

            </tr>

            <tr>
                <td>Product keywords:</td>
                <td><input type="text" name="product_keywords" required /></td>

            </tr>

            <tr>
                <td colspan ="2"><input type ="submit" name="insert_post" value="Insert Now"/></td>
            </tr>
            
    </table>
        </form>
    </body>
</html>
<?php

if (isset($_POST['insert_post'])){
    
    $product_cat = $_POST['product_cat'];
    $product_type = $_POST['product_type'];
    $product_title = $_POST['product_title'];
    $product_author = $_POST['product_author'];
    $product_price = $_POST['product_price'];
    
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    
    $product_description = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
    
    
    move_uploaded_file($product_image_tmp, "./product_images/$product_image");

    $insert_product = "INSERT INTO products (product_cat,product_type,product_title,product_author,product_price,product_image,product_desc,product_keywords) VALUES ('$product_cat','$product_type','$product_title','$product_author','$product_price','$product_image','$product_description','$product_keywords')";
    
    $insert_res = mysqli_query($con, $insert_product);
    //echo (mysqli_error($con));


  if($insert_res){
         echo "<script>alert('Product has been added')</script>";
        echo "<script>window.open('insert_product.php','_self)</script>";
    }
    else{
        echo "<script>alert('Unsuccessful')</script>";
        echo "<script>window.open('insert_product.php','_self)</script>";
    }
}
?>