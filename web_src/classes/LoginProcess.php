<?php
class LoginProcess{
    public static function processLogin($user,$pass,$url){ 
        global $api_key;   
        $web_string = file_get_contents($url."/data_src/api/user/read.php?APIKEY=$api_key&user=".$user);
        $users = json_decode($web_string);
        if(is_array($users) && count($users)>0){
           $user = array_pop($users);
           $verify = password_verify($pass, $user->password);
           if ($verify) {
                $_SESSION["LoginStatus"]="YES";
                $_SESSION["error"]="";
                $_SESSION["userid"]=$user->userid;
                return true;
            } else {
                $_SESSION["LoginStatus"]="NO";
                $_SESSION["userid"]="";
                $_SESSION["error"] = "Incorrect Password!";
                return false;
            }
          
        }else{
            $_SESSION["LoginStatus"]="NO";
            $_SESSION["userid"]="";
            $_SESSION["error"] = "User not found.";
            return false;
        }
        
    }
    public static function processLogout(){ 
        $_SESSION["LoginStatus"]="NO";
        $_SESSION["userid"]="";
        $_SESSION["error"] = "";
    }   
}

?>