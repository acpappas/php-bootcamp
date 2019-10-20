<?php

function auth($login, $passwd){
    $pwf = "../private/passwd";
    if ($login and $passwd){
        $user = unserialize(file_get_contents($pwf));
            foreach($user as $value){
                if ($value['login'] === $login and $value['passwd'] === hash('whirlpool', $passwd)){
                    return TRUE;
                }
                return FALSE;
            }
        }
        else
            return FALSE;
}
?>