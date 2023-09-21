<?php
class CheckLang{
    
    public static function switchLang($lang){
        
        if($lang==NULL){
            $lang = 'eng-us';
            $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
            setcookie("langCook",$lang,time() + 900000, '/',$domain,false,false);
        }
        require_once (__DIR__ . '/../lang/' . $lang .'/lang.php');
        

        /*switch ($lang){

            case 'english':
                require_once (__DIR__ . '/../lang/eng-us/lang.php');
            break;

            case 'espanol':
                require_once (__DIR__ . '/../lang/espanol/lang.php');
            break;

            case 'french':
                require_once (__DIR__ . '/../lang/french/lang.php');
            break;
        }*/
    }
}
?>