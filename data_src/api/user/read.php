<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$table = isset($_GET["table"])?$_GET["table"]:"";
$id = isset($_GET["id"])?$_GET["id"]:"";
$catID = isset($_GET["catID"])?$_GET["catID"]:"";
$key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

$user = isset($_GET["user"])?$_GET["user"]:"";
if($user!=""){
  $where = " where username = :user ";
  $params = [":user"=>$user];
}else{
  $where = " where 1=2 ";
  $params = null;
}
$sql = "select * from user ".$where;
$data = FoodDatabase::getDataFromSQL($sql, $params);

echo json_encode($data);

?>