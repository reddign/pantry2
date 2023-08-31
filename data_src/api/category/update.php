<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods,Content-type,Access-Control-Allow-Origin, Authorization, X-Requested-With");

$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();


require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";


$id = $data->productID;
$productName = $data->productName;
$catID = $data->catID;
$qty = $data->quantity;
$img = $data->img;
$key = $data->APIKEY;


/*
$id = isset($_POST["productID"])?intval($_POST["productID"]):"";
$productName = isset($_POST["productName"])?$_POST["productName"]:"";
$catID = isset($_POST["catID"])?$_POST["catID"]:"";
$qty = isset($_POST["quantity"])?$_POST["quantity"]:"";
$img = isset($_POST["img"])?$_POST["img"]:"";
$key = isset($_POST["APIKEY"])?$_POST["APIKEY"]:"";
*/

if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($id==""||$id==0){
    echo json_encode(["message"=>"No Product ID"]);
    exit;
}


if($img==""){
    $params = [":name"=>$productName,":cid"=>$catID,":q"=>$qty,":id"=>$id];
    $sql = "update product set productName=:name,catID=:cid,quantity=:q WHERE productID=:id;";
    
}else{
    $params = [":name"=>$productName,":cid"=>$catID,":q"=>$qty,":i"=>$img,":id"=>$id];
    $sql = "update product set productName=:name,catID=:cid,quantity=:q,img=:i WHERE productID=:id;";
    
}
$status = FoodDatabase::executeSQL($sql, $params);

if ($status) {
    echo json_encode(["message" => "✅ Product Updated!"]);
} else {
    echo json_encode(["message" => "❌ Cannot Update!"]);
}
