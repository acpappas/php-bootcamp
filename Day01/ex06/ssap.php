#!/usr/bin/php
<?php
$i = 1;
while ($i < $argc)
{
    $input = $input . ' ' . $argv[$i];
    $i++;
}
$input = trim($input);
$input = preg_replace('/\s+/', ' ', $input);
$input = explode(" ", $input);
sort ($input);
foreach($input as $value)
{
    echo("$value\n");
}
?>