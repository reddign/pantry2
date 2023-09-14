<?PHP

// Should not have to be used.

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
$userid = isset($_DELETE["userid"])?intval($_DELETE["userid"]):"";
$key = isset($_DELETE["APIKEY"])?$_DELETE["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($id==""||$id==0){
    echo json_encode(["message"=>"No User ID"]);
    exit;
}

$params = [":id"=>$userid];
$sql = "delete from style WHERE userid=:id;";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Style Created Successfully"];
echo json_encode($message);