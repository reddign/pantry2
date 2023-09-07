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
    // You should establish a database connection and execute an UPDATE query

    // Example code (replace with your database connection and query)
    
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE admin_social_media SET 
                            facebook = ?, 
                            instagram = ?, 
                            twitter = ?, 
                            snapchat = ?, 
                            pinterest = ?, 
                            linkedin = ? 
                            WHERE admin_id = ?");

    // Bind parameters
    $stmt->bind_param("ssssssi", $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin, $adminId);

    // Execute the statement
    if ($stmt->execute()) {
        // Update successful
        $stmt->close();
        $conn->close();
    } else {
        // Handle the error
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
    }
}
?>
