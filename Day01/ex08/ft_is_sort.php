#!usr/bin/php
<?php
function ft_is_sort($arr){
    $a = $arr;
    sort($arr);
    $b = $arr;
if ($b == $a){
    return true;
}
else 
return false;
}
?>