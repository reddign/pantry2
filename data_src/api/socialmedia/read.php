<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$admin_id = isset($_GET["admin_id"])?$_GET["admin_id"]:"";
$key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

if($admin_id!=""){
  $where = " where admin_id = :admin_id ";
  $params = [":admin_id"=>$admin_id];
}else{
  $where = " ";
  $params = null;
}
$sql = "select * from adminsocialmedia ".$where;
$data = FoodDatabase::getDataFromSQL($sql, $params);
    
echo json_encode($data);










?>