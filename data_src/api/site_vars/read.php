<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$userid = isset($_GET["userid"])?$_GET["userid"]:"";
$key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

if($userid!=""){
  $where = " where userid = :id ";
  $params = [":id"=>$userid];
}else{
  $where = " ";
  $params = null;
}
$sql = "select * from style ".$where;
$data = FoodDatabase::getDataFromSQL($sql, $params);
    
echo json_encode($data);



?>