<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$x = __DIR__."/../includes/config.php";
echo $x;

// require "includes/config.php";
// process_social_media.php
require_once $x;

require "SocialMediaFunctions.php";
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
    $adminId = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 1;
    $newmessage = updateSocialMediaLinks($adminId, $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin);
    $response = json_decode($newmessage);
    header("location: ../index.php?page=settings&message=".$response->message);
    }






?>
