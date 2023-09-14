<?php
// process_social_media.php

session_start(); // Start the session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];
    $twitter = $_POST["twitter"];
    $snapchat = $_POST["snapchat"];
    $pinterest = $_POST["pinterest"];
    $linkedin = $_POST["linkedin"];

    // Get the admin's user ID (you may need to fetch it based on the admin's session)
    $adminId = $_SESSION['admin_id']; // Assuming you store the admin's user ID in the session

    // Update the admin_social_media table with the new social media links
    updateSocialMediaLinks($adminId, $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin);

    // Redirect back to the settings page or display a success message
    header("Location: settings.php?success=1");
    exit();
}

// Function to update social media links in the database
function updateSocialMediaLinks($adminId, $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin) {
    // Perform database update here

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "foodpantry";
    $GLOBAL_API_KEY = "848429r2g";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Prepare the SQL statement
    $sql = "INSERT INTO adminsocialmedia (facebook, instagram, 
                                            twitter, snapchat, 
                                            pinterest, linkedin)
            VALUES ($facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin)";
        
}
?>
