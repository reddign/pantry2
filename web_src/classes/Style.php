<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
$x = __DIR__."/../includes/config.php";

// require "includes/config.php";
// process_social_media.php
require_once $x;

require "StyleFunctions.php";
session_start(); // Start the session if not already started


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $pantry_name = isset($_POST["pantry_name"]) ? $_POST["pantry_name"] : "";
    $header_logo = isset($_POST["header_logo"]) ? $_POST["header_logo"] : "";
    $second_logo = isset($_POST["second_logo"]) ? $_POST["second_logo"] : "";
    $background_image = isset($_POST["background_image"]) ? $_POST["background_image"] : "";
    $nav_bg_color = isset($_POST["nav_bg_color"]) ? $_POST["nav_bg_color"] : "";

    // Get the admin's user ID from the session (ensure it's set and valid)
    $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 1;
    $newmessage = updateSocialMediaLinks($userid, $pantry_name, $header_logo, $second_logo, $background_image, $nav_bg_color);
    $response = json_decode($newmessage);
    header("location: ../index.php?page=settings&message=".$response->message);
    }


?>
