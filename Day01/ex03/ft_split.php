#!/usr/bin/php
<?php
function ft_split($input)
{
$input = explode(" ", $input);
sort ($input);
return($input);
}
?>