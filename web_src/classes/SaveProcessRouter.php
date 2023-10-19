<?PHP

class SaveProcessRouter {

    public static function processData(){
        global $page,$content,$url;
        SaveProcessRouter::checkLogin();
        $loginAttempted = isset($_POST["loginBtn"]) && $_POST["loginBtn"]=="LOGIN" ? true:false;
        SaveProcessRouter::loginProcessing($loginAttempted);
        $savingItem = isset($_POST["saveBtn"]) && $_POST["saveBtn"]=="Save Product Info" ? true:false;
        SaveProcessRouter::dataProcessing($savingItem);
        
       

        
    }
    public static function dataProcessing($savingItem){
        global $page,$content,$url;
        if($savingItem){
            if($_POST["id"]==""){
                $dataReturned = EditItemForm::validateAndAddData($_POST,$_FILES,$url);
            }else{
                $dataReturned = EditItemForm::validateAndEditData($_POST,$_FILES,$url);
            }
            $dataDecoded = json_decode($dataReturned);
            if($dataDecoded->message!=""){
                $content .= GeneralContent::getGeneralMessage($dataDecoded->message,"small");
            }else{
                $content .= GeneralContent::getGeneralMessage("No data returned".$dataReturned);
            }
            $_GET["id"]=$_POST["id"];
            $page="products";
        }
    }
    public static function loginProcessing($loginAttempted){
        global $page,$content,$url;
        if($loginAttempted){
            $username = isset($_POST["user"]) ? $_POST["user"]:"";
            $password = isset($_POST["pass"]) ? $_POST["pass"]:"";
            $success = LoginProcess::processLogin($username,$password,$url);
            if($success){
                $page ="about";
            }else{
                $page = "login";
            }
            
        }else if (!isset($_SESSION["LoginStatus"]) || $_SESSION["LoginStatus"] != "YES") {
            if(isset($_GET["page"]) && $_GET["page"] == "register") {
                $page = "register";
            } else {
                $page = "login";
            }
        }
        else{
            $page = isset($_GET["page"])?$_GET["page"]:"about";
        }
        
    }
    public static function checkLogin(){
        if(isset($_POST['adminLoginBtn'])){
            $_SESSION["adminLogin"] = true;
            unset($_SESSION["error"]);
            header("Location: index.php"); 
        }else if(isset($_POST['backToUserLoginBtn'])){
            unset($_SESSION["adminLogin"]);
            unset($_SESSION["error"]);
            header("Location: index.php"); 
        }else if (isset($_POST['registerBtn'])){
            unset($_SESSION["error"]);
            header("Location: index.php?page=register");
        }
    }
}


?>