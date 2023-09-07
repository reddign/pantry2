<?PHP
// This endpoint is used to create non-admin users ONLY.
header('Content-Type: application/json');
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../classes/Validator.php";

$schema = [
	'username' => ['required' => true],
];

$validator = new Validator($schema, $_POST);
$validator->validate();

$key = isset($_POST["APIKEY"]) ? $_POST["APIKEY"] : "";
if ($key != $GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

$uname = $_POST["username"];

if (isUsernameTaken($uname)){
	http_response_code(400);
	echo json_encode(["message"=>"Username is already taken"]);
	exit;
}

$params = [":username"=>$uname,":isAdmin"=>0];
$sql = "INSERT INTO user (username,isAdmin) VALUES (:username,:isAdmin);";

$userId = (int) FoodDatabase::executeSQL($sql, $params, true);
echo json_encode(["userID" => $userId]);

function isUsernameTaken($username){
	$sql = "SELECT username FROM user WHERE username=:username;";
	$params = [":username"=>$username];
	$result = FoodDatabase::getDataFromSQL($sql,$params);

	if (count($result) > 0){
		return true;
	}
	return false;
}
