<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$basketID = isset($_POST["id"]) ? $_POST["id"] : "";
if ($basketID == "") {
  echo json_encode(["message" => "Missing id parameter for cart"]);
  http_response_code(400);
  exit;
}

// $key = isset($_GET["APIKEY"])?$_GET["APIKEY"]:"";
// if($key!=$GLOBAL_API_KEY){
  //   echo json_encode(["message"=>"Invalid API KEY"]);
  //   exit;
  // }

/**
 * The following SQL statments do the following:
 * 
 * Decreases the quantity of each product in the basket by 1
 * Deletes all basket items
 * Deletes the basket
 */
$item_qty_sql = 
"SELECT COUNT(*)
 FROM BasketItem bi
 JOIN Basket b ON bi.basketID = b.basketID
 WHERE bi.productID = p.productID AND b.basketID = :basketID";

$update_stmt_where = 
"WHERE productID IN (
  SELECT bi.productID
  FROM Basket b
  JOIN BasketItem bi ON bi.basketID = b.basketID
  WHERE b.basketID = :basketID
)";

$update_sql = "UPDATE product p
             SET quantity = quantity - ($item_qty_sql)
             $update_stmt_where;
";
$deleteBasketItem = "DELETE FROM BasketItem WHERE basketID = :basketID";
$deleteBasket = "DELETE FROM Basket WHERE basketID = :basketID";

$params = [":basketID" => $basketID];

FoodDatabase::startTransaction();
try {
  FoodDatabase::executeSQL($update_sql, $params);
  FoodDatabase::executeSQL($deleteBasketItem, $params);
  FoodDatabase::executeSQL($deleteBasket, $params);

  FoodDatabase::commitTransaction();
  http_response_code(200);
} catch (Exception $e) {
  FoodDatabase::rollbackTransaction();
  http_response_code(500);
}
?>