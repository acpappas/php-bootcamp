<?php

    $pwd = "../private";
    $pwf = "../private/passwd";
    
    if($_POST['submit'] !== "OK" or $_POST['login'] === "" or $_POST['passwd'] === ""){
        
        echo ("ERROR\n");
            die ;
    }
        if (!file_exists($pwd)){
            mkdir($pwd);
        }
        if (!file_exists($pwf)){
            file_put_contents($pwf, NULL);
        }

        if (file_exists($pwf)){
            $userInput = unserialize(file_get_contents($pwf));
                foreach ($userInput as $value) {
                    if ($value['login'] === $_POST['login']){
                        echo ("ERROR\n");
                        die ;
                }
            }
        }
        $temp['login'] = $_POST['login'];
        $temp['passwd'] = hash('whirlpool', $_POST['passwd']);
        $userInput[] = $temp;
        file_put_contents($pwf, serialize($userInput));
        echo ("OK\n");

?>