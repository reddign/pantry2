<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Sam Huhn";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>Sam Huhn</h1>
        <div class="section">Sam Huhn is a junior who is pursuing a major in Computer Science. He hopes to get a career in Software Engineering after graduating in 2025.
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
        
    
</div>
   
</body>
<?php
    require_once "includes/sidebar.php";
    ?>