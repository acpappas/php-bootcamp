#!/usr/bin/php
<?PHP
while (!feof(STDIN))
{
echo "Enter a number: "; 
$input = trim(fgets(STDIN));
if (feof(STDIN))
{
    exit("\n");
}
if (!is_numeric($input))
{
    echo "'" .$input. "' is not a number";
}
else if ($input % 2 == 0)
{
    echo "The number '" .$input. "' is even";
}
else
{
    echo "The number '" .$input. "' is odd";
}
echo "\n";
}
?>