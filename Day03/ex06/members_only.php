<?php
if ($_SERVER['PHP_AUTH_USER'] == "zaz" and $_SERVER['PHP_AUTH_PW'] == "Ilovemylittlepony")
{
header('Content-type=text/html');
$img = file_get_contents('./img/42.png');
$hashed = base64_encode($img);
echo("<html><body>\nHello Zaz<br />\n<img src=data:image/png;base64,$hashed>\n<body><html>\n");
}
else{
    header('HTTP/1.0 401 Unauthorized');
    header('WWW-Authenticate: Basic realm=\'\'Member Area\'\'');
    echo("<html><body>That area is accessible for members only</body></html>\n");
}
?>


    