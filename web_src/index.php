<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "includes/config.php";
require_once "classes/LoginProcess.php";
require_once "classes/PageRouter.php";
require_once "classes/GeneralContent.php";
require_once "classes/EditItemForm.php";
$title = $pantryName;
$useFoodTabs = false;
$useChartTabs = false;
$useCategoryTabs = false;
$useSettingTabs = false;
$loginAttempted = isset($_POST["loginBtn"]) && $_POST["loginBtn"]=="LOGIN" ? true:false;
if($loginAttempted){
    $username = isset($_POST["user"]) ? $_POST["user"]:"";
    $password = isset($_POST["pass"]) ? $_POST["pass"]:"";
    $success = LoginProcess::processLogin($username,$password,$url);
    if($success){
        $page ="about";
    }else{
        $page = "login";
    }
    
}else{
    $page = isset($_GET["page"])?$_GET["page"]:"about";
}
$content = '';
$savingItem = isset($_POST["saveBtn"]) && $_POST["saveBtn"]=="Save Product Info" ? true:false;
if($savingItem){
    $dataReturned = EditItemForm::validateAndProcessData($_POST,$_FILES,$url);
    $dataDecoded = json_decode($dataReturned);
    if($dataDecoded->message!=""){
        $content .= GeneralContent::getGeneralMessage($dataDecoded->message,"small");
    }else{
        $content .= GeneralContent::getGeneralMessage("No data returned".$dataReturned);
    }
    $_GET["id"]=$_POST["id"];
    $page="products";
}
$content .= PageRouter::getContent($page,$url);




//page content now out to screen
require_once "includes/header.php";
require_once "includes/sidebar.php";
if($useFoodTabs){
    require_once "includes/foodtabs.php";
}
if($useChartTabs){
    require_once "includes/charttabs.php";
}

if($useSettingTabs){
    require_once "includes/settingtabs.php";
}

echo $content;
require_once "includes/footer.php";
?>