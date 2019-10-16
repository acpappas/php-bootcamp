#!/usr/bin/php
<?php
$input = $argv[1];
$input = trim($input);
$input = preg_replace('/\s+/', ' ', $input);
$input = explode(" ", $input);
$last = array_pop($input);
array_unshift($input, $last);
$input = implode(" ", $input);
echo ("$input\n");
?>