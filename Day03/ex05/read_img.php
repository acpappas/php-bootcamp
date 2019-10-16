<?php
header('Content-type: image/png');
$image = 'img/42.png';
readfile($image);
?>