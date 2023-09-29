<?PHP

// Should only be used once to add initial values.

//This code has not be really worked out or tested yet.
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$userid = isset($_POST["userid"])?$_POST["userid"]:"";
$pantry_name = isset($_POST["pantry_name"])?$_POST["pantry_name"]:"";
$header_logo = isset($_POST["logo1"])?$_POST["logo1"]:"";
$second_logo = isset($_POST["logo2"])?$_POST["logo2"]:"";
$background_image = isset($_POST["background_image"])?$_POST["background_image"]:"";
$nav_bg_color = isset($_POST["nav_bg_color"])?$_POST["nav_bg_color"]:"";
$key = isset($_POST["APIKEY"])?$_POST["APIKEY"]:"";

if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
$params = [":id"=>$userid,":pantry_name"=>$pantry_name,":logo1"=>$header_logo,":logo2"=>$second_logo,":background_img"=>$background_image,":nav_bg"=>$nav_bg_color];
$sql = "insert into style (userid,pantry_name,header_logo,second_logo,background_image,nav_bg_color) VALUES (:id,:logo1, :logo2, :background_img, :nav_bg);";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Style Created Successfully"];
echo json_encode($message);

