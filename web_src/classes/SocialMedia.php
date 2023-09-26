<?php
// process_social_media.php
require_once "GeneralContent.php";

session_start(); // Start the session if not already started


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $facebook = isset($_POST["facebook"]) ? $_POST["facebook"] : "";
    $instagram = isset($_POST["instagram"]) ? $_POST["instagram"] : "";
    $twitter = isset($_POST["twitter"]) ? $_POST["twitter"] : "";
    $snapchat = isset($_POST["snapchat"]) ? $_POST["snapchat"] : "";
    $pinterest = isset($_POST["pinterest"]) ? $_POST["pinterest"] : "";
    $linkedin = isset($_POST["linkedin"]) ? $_POST["linkedin"] : "";

    // Get the admin's user ID from the session (ensure it's set and valid)
    $adminId = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : null;

    if ($adminId !== null) {
        // Perform database update securely using prepared statements
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "foodpantry";
        $GLOBAL_API_KEY = "848429r2g";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement with placeholders
        $sql = "UPDATE adminsocialmedia 
                SET facebook=?, instagram=?, twitter=?, snapchat=?, pinterest=?, linkedin=?
                WHERE admin_id=?";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("ssssssi", $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin, $adminId);
            $stmt->execute();

            // Check for errors
            if ($stmt->error) {
                die("Error: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();
        } else {
            die("Error in preparing statement: " . $conn->error);
        }

        // Close the database connection
        $conn->close();
    }

    // Redirect back to the settings page or display a success message
    header("Location: settings.php?success=1");
    exit();
}
?>
