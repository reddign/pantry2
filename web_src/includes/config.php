<?php

$url = "http://127.0.0.1/pantry2";

$api_key = "848429r2g";



class checkLang{
    public static function switchLang($lang){
        $lang = "english";

        switch ($lang){

            case 'english':
                require_once (__DIR__ . '\..\lang\eng-us\lang.php');
            break;

            case 'espanol':
                require_once (__DIR__ . '\..\lang\french\lang.php');
            break;

            case 'french':
                require_once (__DIR__ . '\..\lang\french\lang.php');
            break;
        }
    }
}
?>