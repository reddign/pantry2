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
  $sql = "select P.productName, Sum(TD.quantity)
  from product P,
  transactionsDetails TD
  where P.productID = TD.productID 
  GROUP BY P.productName;";
  $params = null;
}else if($graphType=="ByCategory"){
  $catID = isset($catID)&&$catID!=""?$catID:2;
  $sql = "select P.productName, COUNT(TD.transactionID) total
  from product P,
  transactionsDetails TD
  where P.productID = TD.productID and p.catID = :catid
  GROUP BY P.productName";
  $params = [":catid"=>$catID];
  // echo $sql;
  // print_r($params);
}
//TODO make this sql work
else if($graphType=="ByUserInfo"){
  $sql = "select userID, SUM(children), SUM(adult), SUM(senior)
  from registration GROUP BY userID";
  $params = null;
}

else{

  if(isset($_GET["date1"])){
    $params = [":date1"=>$_GET["date1"],":date2"=>$_GET["date2"]];
    $where = "where date BETWEEN :date1 and :date2";
  }else{
    $params = null;
    $where = '';
  }
  

  // Pulls and Formats transaction Date
  $sql = "select DATE_FORMAT( date, 'YYYY-MM-DD' ) as transactionDate, COUNT(date) total
      from transactions
      ".$where."
      GROUP BY date;";

      
  
  
  }



$data = FoodDatabase::getDataFromSQL($sql, $params);

echo json_encode($data);










?>