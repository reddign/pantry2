<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$id = isset($_GET["id"])?$_GET["id"]:"";
$catID = isset($_GET["catID"])?$_GET["catID"]:"";
$key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

if($catID!=""){
  $where = " where catID = :catid ";
  $params = [":catid"=>$catID];
}elseif($id!=""){
  $where = " where productID = :id ";
  $params = [":id"=>$id];
}else{
  $where = " ";
  $params = null;
}
$sql = "select * from product ".$where;
$data = FoodDatabase::getDataFromSQL($sql, $params);
    
echo json_encode($data);










?>