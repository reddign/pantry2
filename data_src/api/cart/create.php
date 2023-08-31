<?PHP

//This code has not be really worked out or tested yet.
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$productName = isset($_POST["productName"])?$_POST["productName"]:"";
$catID = isset($_POST["catID"])?$_POST["catID"]:"";
$qty = isset($_POST["quantity"])?$_POST["quantity"]:"";
$img = isset($_POST["img"])?$_POST["img"]:"";
$key = isset($_POST["APIKEY"])?$_POST["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
$params = [":name"=>$productName,":cid"=>$catID,":q"=>$qty,":i"=>$img];
$sql = "insert into product (productName,catID,qty,img) VALUES (:name,:cid,:q,:i);";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Product Created Successfully"];
echo json_encode($message);
