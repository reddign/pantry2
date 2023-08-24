<?PHP
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
$id = isset($_DELETE["productID"])?intval($_DELETE["productID"]):"";
$key = isset($_DELETE["APIKEY"])?$_DELETE["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($id==""||$id==0){
    echo json_encode(["message"=>"No Product ID"]);
    exit;
}

$params = [":id"=>$id];
$sql = "delete from product WHERE productID=:id;";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Product Created Successfully"];
echo json_encode($message);
