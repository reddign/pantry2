<?PHP

class FoodDatabase{
    private static $conn = null;

    private static function connect() {
        global $servername, $database, $username, $password;

        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                http_response_code(500);
                exit();
            }
        }
    }

    public static function getDataFromSQL($sql,$params=null){
        self::connect();
        
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($params);
        //$stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $valuesArray = $stmt->fetchAll();
        return $valuesArray;
    }

    public static function executeSQL($sql,$params=null){
        self::connect();
        
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($params);
        return true;
    }

    public static function startTransaction() {
        self::connect();
        self::$conn->beginTransaction();
    }

    public static function commitTransaction() {
        self::$conn->commit();
    }

    public static function rollbackTransaction() {
        self::$conn->rollback();
    }
}
?>