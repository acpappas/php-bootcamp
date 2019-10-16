
<?php

$con = mysqli_connect("localhost","root", "connect","minishop");

function getCats(){
    
    global $con;
    
    $get_cats= 'SELECT * FROM categories';
    
    $run_cats = mysqli_query($con, $get_cats);
    
    while ($row_cats = mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_text = $row_cats['cat_text'];
    
    echo "<option value='$cat_id'>$cat_text</option>";
    }
}

function getGenres(){
    
  global $con;
  
 $get_genres = 'SELECT * FROM genres';
  
  $run_genres = mysqli_query($con, $get_genres);
  
while ($row_genres = mysqli_fetch_array($run_genres)){
$genre_id = $row_genres['genre_id'];
$genre_text = $row_genres['genre_text'];
  
echo "<option value='$genre_id'>$genre_text</option>";
  }
}
?>