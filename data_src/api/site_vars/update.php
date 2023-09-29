<?php
// Headers for GET Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods,Content-type,Access-Control-Allow-Origin, Authorization, X-Requested-With");

$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();


require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";


$userid = $data->userid;
$pantry_name = $data->pantry_name;
$header_logo = $data->header_logo;
$second_logo = $data->second_logo;
$background_image = $data->background_image;
$nav_bg_color = $data->nav_bg_color;
$key = $data->APIKEY;


if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
if($userid==""||$userid==0){
    echo json_encode(["message"=>"No User ID"]);
    exit;
}


$params = [":logo"=>$logo,":pantry_name"=>$pantry_name,":userpg"=>$user_paragraph,":dark_bg"=>$dark_bg_color,":med_bg"=>$med_bg_color,":light_bg"=>$light_bg_color,":med_border"=>$med_border_color,":dark_border"=>$dark_border_color,":error"=>$error_color];
$sql = "update style set logo=:logo,user_paragraph=:userpg,dark_bg_color=:dark_bg,med_bg_color=:med_bg,light_bg_color=:light_bg,med_border_color=:med_border,dark_border_color=:dark_border,error_color=:error WHERE productID=:id;";
$status = FoodDatabase::executeSQL($sql, $params);

if ($status) {
    echo json_encode(["message" => "✅ Style Updated!"]);
} else {
    echo json_encode(["message" => "❌ Cannot Update!"]);
}
