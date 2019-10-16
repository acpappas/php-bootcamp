#!/usr/bin/php
<?php
function ft_is_sort($arr){
    $a = $arr;
    $b = sort($arr);
    if ($a == $b){
        return (true);
    }
    else
    return(false);
}
?>