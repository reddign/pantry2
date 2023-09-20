<?PHP

// Should only be used once to add initial values.

//This code has not be really worked out or tested yet.
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$userid = isset($_POST["userid"])?$_POST["userid"]:"";
$logo = isset($_POST["logo"])?$_POST["logo"]:"";
$user_paragraph = isset($_POST["user_paragraph"])?$_POST["user_paragraph"]:"";
$dark_bg_color = isset($_POST["dark_bg_color"])?$_POST["dark_bg_color"]:"";
$med_bg_color = isset($_POST["med_bg_color"])?$_POST["med_bg_color"]:"";
$light_bg_color = isset($_POST["light_bg_color"])?$_POST["light_bg_color"]:"";
$med_border_color = isset($_POST["med_border_color"])?$_POST["med_border_color"]:"";
$dark_border_color = isset($_POST["dark_border_color"])?$_POST["dark_border_color"]:"";
$error_color = isset($_POST["error_color"])?$_POST["error_color"]:"";
$key = isset($_POST["APIKEY"])?$_POST["APIKEY"]:"";

if($key!=$GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}
$params = [":id"=>$userid,":logo"=>$logo,":userpg"=>$user_paragraph,":dark_bg"=>$dark_bg_color,":med_bg"=>$med_bg_color,":light_bg"=>$light_bg_color,":med_border"=>$med_border_color,":dark_border"=>$dark_border_color,":error"=>$error_color];
$sql = "insert into style (userid,logo,user_paragraph,dark_bg_color,med_bg_color,light_bg_color,med_border_color,dark_border_color,error_color) VALUES (:id,:logo,:userpg,:dark_bg,:med_bg,:light_bg,:med_border,:dark_border,:error);";
FoodDatabase::executeSQL($sql, $params);
$message = ["message"=>"Style Created Successfully"];
echo json_encode($message);

