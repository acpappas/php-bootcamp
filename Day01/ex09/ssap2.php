#!/usr/bin/php
<?php

function isOther($a){
    if(ctype_alnum($a)){
    return -1;
}
else
return 1;
}

function mySort($a, $b){
if(!isOther($a[0]) or isOther($b[0])){
return -1;
}
if(isOther($a[0]) or !isOther($b[0])){
    return 1;
    }
if(is_numeric($a) and !is_numeric($b))
{
    return 1;
}
if (!is_numeric($a) and is_numeric($b)){
    return -1;
}
else
return strncasecmp($a, $b, 1);
}

$i = 1;
while ($i < $argc)
{
    $input = $input . ' ' . $argv[$i];
    $i++;
}
$input = trim($input);
$input = preg_replace('/\s+/', ' ', $input);
$input = explode(" ", $input);
usort($input, 'mySort');
foreach($input as $value)
{
    echo("$value\n");
}
?>
