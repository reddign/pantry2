<?PHP
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
$admin_id = isset($_DELETE["admin_id"])?intval($_DELETE["admin_id"]):"";
$key = isset($_DELETE["APIKEY"])?$_DELETE["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($admin_id==""||$admin_id==0){
    echo json_encode(["message"=>"No Admin ID"]);
    exit;
}

$params = [":admin_id"=>$admin_id];
$sql = "delete from adminsocialmedia WHERE admin_id=:admin_id;";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Social Media Link Created Successfully"];
echo json_encode($message);
