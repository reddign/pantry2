<?php
/*******
 * 
 * Page Router Class
 * 
 */
class PageRouter{
    public static function getContent($page,$url){
        global $useFoodTabs,$useChartTabs,$useCategoryTabs,$api_key;
        
        $content = '';
        
        //determine page content
        switch($page){
            case "data":
                $fullUrl = $url."/data_src/api/products/read.php";
                $vars = ["APIKEY"=>$api_key];
                //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key");
                $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
                $content = $web_string;
                $useFoodTabs = true;
            break;
            case "data_array":
                $fullUrl = $url."/data_src/api/products/read.php";
                $vars = ["APIKEY"=>$api_key];
                //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key");
                $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
                $json_array= json_decode($web_string);
                $content = "<pre>"; ///HTML pre tags just make this look pretty
                $content .= print_r($json_array,TRUE);
                $content .= "</pre>";
                $useFoodTabs = true;
            break;
            case "edit":
                $editID = isset($_GET["editID"])?$_GET["editID"]:"";
                if($editID==""){
                    $catID = isset($_GET["catID"])?$_GET["catID"]:"";
                    $fullUrl = $url."/data_src/api/products/read.php";
                    $vars = ["APIKEY"=>$api_key,"catID"=>$catID];
                    //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key");
                    $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
                    $products = json_decode($web_string);
                    
                    $content .= GeneralContent::getAllProductsDisplay($products,"EDIT INVENTORY","edit"); 
                    $useFoodTabs = true;
                }else{
                    $products_url = $url."/data_src/api/products/read.php";
                    $pvars = ["APIKEY"=>$api_key,"id"=>$editID];
                    $web_string = DatabaseAPIConnection::get($products_url,$pvars);
                    //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key&id={$editID}");
                    $products = json_decode($web_string);


                    $category_url = $url."/data_src/api/category/read.php";
                    $cvars = ["APIKEY"=>$api_key];
                    $web_string2 = DatabaseAPIConnection::get($category_url,$cvars);
 //                   $web_string2 = file_get_contents($url."/data_src/api/category/read.php?APIKEY=$api_key");
                    $categories = json_decode($web_string2);
                    $content .= EditItemForm::getForm($products[0],$categories);    
                }
            break;
            case "products":
                $catID = isset($_GET["catID"])?$_GET["catID"]:"";
                $id = isset($_GET["id"])?$_GET["id"]:"";

                $fullUrl = $url."/data_src/api/products/read.php";
                $vars = ["APIKEY"=>$api_key,"catID"=>$catID,"id"=>$id];
                //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key");
                $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
            
                //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key&catID={$catID}&id={$id}");
                //$web_string = file_get_contents($url."/data_src/data.php?table=products&catID={$catID}");
                $products = json_decode($web_string);
                $content .= GeneralContent::getAllProductsDisplay($products,"INVENTORY"); 
                $useFoodTabs = true;
            break;
            case "reports":
                //Please use comments.  You are a professor.  They are watching you!
                $catID = isset($_GET["catID"])?$_GET["catID"]:"";
                $graphType = isset($_GET["graphType"])?$_GET["graphType"]:"";
                $fullUrl = $url."/data_src/api/reports/read.php";
                $vars = ["APIKEY"=>$api_key,"catID"=>$catID,"graphType"=>$graphType];
                $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
            
                //$web_string = file_get_contents($url."/data_src/api/reports/read.php?APIKEY=$api_key&graphType={$graphType}&catID={$catID}");
                $reportData = json_decode($web_string);
                $content .= GeneralContent::getReportDisplay($reportData,$graphType); 
                $useChartTabs = true;
                if(isset($graphType) && $graphType=="ByCategory"){
                    $useCategoryTabs = true;
                }
            break;

            case "settings":
                $content .= "<br> <br> <br> <br> <h1> Nolan was here. </h1>";
            break;

            case "about":
                $content = GeneralContent::getAbout();
            break;
            case "contact":
                $content = GeneralContent::getContact();
            break;
            case "login":
                $content = GeneralContent::getLoginForm();
            break;
            case "register":
                $content = GeneralContent::getRegisterForm();
            break;
            case "logout":
                $content = LoginProcess::processLogout();
                $content = GeneralContent::getGeneralMessage(" Logout Success! ");
            break;
            case "cart":
                
                if(!isset($_SESSION["CartID"]) || intval($_SESSION["CartID"])<=0 ){


                    $apiUrl = $url."/data_src/api/cart/create.php";
                    $data = ["APIKEY"=>$api_key,"userID"=>$_SESSION["userId"]];
                    
                    $message = DatabaseAPIConnection::post($apiUrl,$data);
                    $data = json_decode($message);
                    $_SESSION["CartID"]=$data->basketID;
                    
                }
                $fullUrl = $url."/data_src/api/cart/read.php";
                $vars = ["APIKEY"=>$api_key,"id"=>$_SESSION["CartID"]];
                $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
            
                //$web_string = file_get_contents($url."/data_src/api/cart/read.php?APIKEY=$api_key");
                $products = json_decode($web_string);
                $content .= GeneralContent::getAllProductsDisplay($products,"MY CART","remove"); 
                $useFoodTabs = true;
            break;
            default:
                $content = GeneralContent::getGeneralMessage("I need to make more code for the page: ".$page);
            break;
        }
        return $content;
    }
}
?>