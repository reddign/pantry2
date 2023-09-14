<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$schema = [
	'id' => ['required' => true],
];

$validator = new Validator($schema, $_POST);
$validator->validate();

$key = isset($_GET["APIKEY"]) ? $_GET["APIKEY"] : "";
if ($key != $GLOBAL_API_KEY) {
    echo json_encode(["message"=>"Invalid API KEY"]);
    exit;
}

$basketID = $_POST["id"];

/**
 * The following SQL statments do the following:
 * 
 * Select basket and basketItems
 * Create a transaction with the same userID as the basket
 * Create a transactionDetails for each basketItem
 * Decreases the quantity of each product in the basket by 1
 * Deletes all basket items in the basket
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

$update_product_qty_sql = "UPDATE product p
             SET quantity = quantity - ($item_qty_sql)
             $update_stmt_where;
";

$get_basket_sql = "SELECT userID FROM basket WHERE basketID = :basketID";
$get_basketItems_sql = "SELECT productID, quantity FROM basketItem WHERE basketID = :basketID";

$create_transaction_sql = 'INSERT INTO transactions (date, userID)
                           SET date = NOW(), userID = :userID';
$create_transactionsDetails_sql = 'INSERT INTO transactionsDetails (transactionID, productID, quantity)
                                   VALUES (:transactionID, :productID, :quantity)';

$delete_basketItem = "DELETE FROM BasketItem WHERE basketID = :basketID";
$delete_basket = "DELETE FROM Basket WHERE basketID = :basketID";

$basketParams = [":basketID" => $basketID];

$basket = FoodDatabase::getDataFromSQL($get_basket_sql, $basketParams);
if (count($basket) == 0) {
  echo json_encode(["message"=>"Basket not found"]);
  http_response_code(404);
  exit;
}

$basket = $basket[0];
$basketItems = FoodDatabase::getDataFromSQL($get_basketItems_sql, $basketParams);

FoodDatabase::startTransaction();
try {
  $transactionParams = [":userID" => $basket["userID"]];
  $transactionID = FoodDatabase::executeSQL($create_transaction_sql, $transactionParams, true);

  foreach ($basketItems as $basketItem) {
    $transactionDetailsParams = [
      ":productID" => $basketItem["productID"],
      ":quantity" => $basketItem["quantity"],
      ":transactionID" => $transactionID,
    ];
    
    FoodDatabase::executeSQL($create_transactionsDetails_sql, $transactionDetailsParams);
  }

  FoodDatabase::executeSQL($update_product_qty_sql, $basketParams);
  FoodDatabase::executeSQL($delete_basketItem, $basketParams);
  FoodDatabase::executeSQL($delete_basket, $basketParams);

  FoodDatabase::commitTransaction();
  http_response_code(200);
} catch (Exception $e) {
  FoodDatabase::rollbackTransaction();
  http_response_code(500);
}
?>