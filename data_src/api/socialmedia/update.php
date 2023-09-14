<?php
// Headers for PUT Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-type, Access-Control-Allow-Origin, Authorization, X-Requested-With");

$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();

// Assuming you have included the necessary database configuration and class files
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$admin_id = $data->admin_id;
$facebook = $data->facebook;
$instagram = $data->instagram;
$twitter = $data->twitter;
$snapchat = $data->snapchat;
$pinterest = $data->pinterest;
$linkedin = $data->linkedin;
$key = $data->APIKEY; // Assuming you have an API key for authentication


if($key!=$GLOBAL_API_KEY){
    echo json_encode(["message"=>"Invalid API KEY"]);
    exit;
  }
  if($admin_id==""||$admin_id==0){
      echo json_encode(["message"=>"No Admin ID"]);
      exit;
  }
  
    $params = [":facebook"=>$facebook,":instagram"=>$instagram,":twitter"=>$twitter,":snapchat"=>$snapchat,":pinterest"=>$pinterest,":linkedin"=>$linkedin];
    $sql = "update adminsocialmedia set facebook=:facebook,instagram=:instagram,twitter=:twitter,snapchat=:snapchat,pinterest=:pinterest,linkedin=:linkedin WHERE admin_id=:admin_id;";
      
  $status = FoodDatabase::executeSQL($sql, $params);
  
  if ($status) {
      echo json_encode(["message" => "✅ Social Media Updated!"]);
  } else {
      echo json_encode(["message" => "❌ Cannot Update!"]);
  }