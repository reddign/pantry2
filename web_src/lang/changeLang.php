<?PHP

$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
setcookie("langCook","",1,'/',$domain,false,false);
$lang = $_GET["lang"];
setcookie("langCook",$lang,time() + 900000, '/',$domain,false,false);
header("location:../index.php");

?>