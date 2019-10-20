<?php

    $pwd = "../private";
    $pwf = "../private/passwd";
    
    if($_POST['submit'] !== "OK" or $_POST['login'] === "" or $_POST['oldpw'] === "" or $_POST['newpw'] === ""){
        
        echo ("ERROR\n");
            die ;
    }
    if (!file_get_contents($pwf)){
        echo ("ERROR\n");
        die ;
    }

            $userInput = unserialize(file_get_contents($pwf));
            $_newpw = hash('whirlpool', $_POST['newpw']);
            $_oldpw = hash('whirlpool', $_POST['oldpw']);
            foreach ($userInput as &$value) {
                if ($value['login'] === $_POST['login'] and $value['passwd'] === $_oldpw){
                    $value['passwd'] = $_newpw;
                    file_put_contents($pwf, serialize($userInput));
                    echo ("OK\n");
                    return ;
                }
            }
echo ("ERROR\n");
die ;


?>