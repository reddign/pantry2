<?php
class CheckLang{
    
    public static function switchLang($lang){
        
        if($lang==NULL){
            $lang = 'eng-us';
            $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
            setcookie("langCook",$lang,time() + 900000, '/',$domain,false,false);
        }
        require_once (__DIR__ . '/../lang/' . $lang .'/lang.php');
        
    }
}
?>