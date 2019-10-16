#!/usr/bin/php
<?php
$input = $argv[1];
$input = trim($input);
$new = preg_replace('/\s+/', ' ', $input);
echo "$new\n";
?>