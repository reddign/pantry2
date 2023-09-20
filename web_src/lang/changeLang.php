<?PHP
$lang = $_GET["lang"];

setcookie("langCook",$lang,time() + 900000);

?>