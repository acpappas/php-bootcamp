<?php
foreach($_GET as $key => $value)
{
    $arr[$key] = $value;
}
if ($arr['action'] == 'set') {

    setcookie($arr['name'], $arr['value'], time()+3600);
}
if ($arr['action'] == 'get') {
    if(!$_COOKIE[$arr['name']])
        exit ;
    echo $_COOKIE[$arr['name']] . "\n";
}
if ($arr['action'] == 'del') {
    setcookie($arr['name'], "", time()-1);
}
?>