<?php
class LoginProcess {

    private static function hashUsername($username) {
        $hash = hash("sha256", $username);
        return $hash;
    }
    

    public static function processLogin($user, $pass, $url) { 
        global $api_key;
        $hashedUsername = self::hashUsername($user);
        $web_string = file_get_contents($url."/data_src/api/user/read.php?APIKEY=$api_key&user=".$hashedUsername);
        $users = json_decode($web_string);
        if (is_array($users) && count($users) > 0) {
            $user = array_pop($users);

            if ($user->isAdmin) {
                if($pass == "" || $pass == null){
                    $_SESSION["LoginStatus"] = "NO";
                    $_SESSION["isAdmin"] = false;
                    $_SESSION["userId"] = "";
                    $_SESSION["error"] = "Admin users must login with their password.";
                    return false;
                }else if (password_verify($pass, $user->password)) {
                    $_SESSION["LoginStatus"] = "YES";
                    $_SESSION["isAdmin"] = true;
                    $_SESSION["error"] = "";
                    $_SESSION["userId"] = $user->userId;
                    return true;
                } else {
                    $_SESSION["LoginStatus"] = "NO";
                    $_SESSION["isAdmin"] = false;
                    $_SESSION["userId"] = "";
                    $_SESSION["error"] = "Incorrect Password!";
                    return false;
                }
            } else {
                $_SESSION["LoginStatus"] = "YES";
                $_SESSION["isAdmin"] = false;
                $_SESSION["error"] = "";
                $_SESSION["userId"] = $user->userId;
                return true;
            }
        } else {
            $_SESSION["LoginStatus"] = "NO";
            $_SESSION["isAdmin"] = false;
            $_SESSION["userId"] = "";
            $_SESSION["error"] = "User not found.";
            return false;
        }
    }

    public static function processLogout() { 
        $_SESSION["LoginStatus"] = "NO";
        $_SESSION["isAdmin"] = false;
        $_SESSION["userId"] = "";
        $_SESSION["error"] = "";
    }
}


?>