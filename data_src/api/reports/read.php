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
$graphType = isset($_GET["graphType"])?$_GET["graphType"]:"";

if($graphType=="ByProduct"){
  $sql = "select P.productName, COUNT(BI.basketID) total
  from product P,
  BasketItem BI
  where P.productID = BI.productID 
  GROUP BY P.productName;";
  $params = null;
}else if($graphType=="ByCategory"){
  $catID = isset($catID)&&$catID!=""?$catID:2;
  $sql = "select P.productName, COUNT(BI.basketID) total
  from product P,
  BasketItem BI
  where P.productID = BI.productID and catID = :catid
  GROUP BY P.productName";
  $params = [":catid"=>$catID];
  // echo $sql;
  // print_r($params);
}
/*
else if($graphType=="ByUserInfo"){
  $sql = TODO add sql statment here
}
*/
else{

  if(isset($_GET["date1"])){
    $params = [":date1"=>$_GET["date1"],":date2"=>$_GET["date2"]];
    $where = "where basketDate BETWEEN :date1 and :date2";
  }else{
    $params = null;
    $where = '';
  }
  

  $sql = "select basketDate as productName, COUNT(basketDate) total
      from Basket
      ".$where."
      GROUP BY basketDate;";
  
  
  }



$data = FoodDatabase::getDataFromSQL($sql, $params);

echo json_encode($data);










?>