<?php
//determine page spoken language
//make a cookie if there is none
if(!isset($_COOKIE["langCook"])||$_COOKIE["langCook"]==""){
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
    setcookie("langCook","eng-us",time() + 900000, '/',$domain,false,false);
}


        
//switch lang to match cookie
checkLang::switchLang($_COOKIE["langCook"]);
?>