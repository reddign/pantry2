<?PHP
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
$key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:""; //change paramter to get requests??
$id = isset($_GET["productID"])?intval($_GET["productID"]):"";
$basket_item_id = isset($_GET["BasketItemID"])?intval($_GET["BasketItemID"]):"";
$basket_id = isset($_GET["basketID"])?intval($_GET["basketID"]):"";
if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($id==""||$id==0){
    echo json_encode(["message"=>"No Product ID"]);
    exit;
}
if($basket_item_id==""||$basket_item_id==0){
  echo json_encode(["message"=>"No Basket Item ID"]);
  exit;
}
if($basket_id==""||$basket_id==0){
  echo json_encode(["message"=>"No Basket ID"]);
  exit;
}
$params = [":id"=>$id, ":basket_item_id"=>$basket_item_id, ":basket_id"=>$basket_id];
$sql = "DELETE FROM basketitem WHERE productID = :id AND BasketItemID = :basket_item_id AND BasketID = :basket_id";
try {
  // Execute the SQL query and handle error
  FoodDatabase::executeSQL($sql, $params);
  http_response_code(200); // OK
  $message = ["message" => "Product Removed From Cart"];
  echo json_encode($message);
} catch (PDOException $e) {
  http_response_code(500); // Internal Server Error
  echo json_encode(["message" => "Database Error: " . $e->getMessage()]);
}
?>