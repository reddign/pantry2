<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Danielle Strausburger";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>Danielle Strausburger</h1>
        <div class="section"> Danielle Strausburger is a junior at Elizabethtown College. 
            She is majoring in Computer Science, with a concentration in Web and Application Design. She is also minoring in Graphic Design, and intends to graduate in 2025.
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
        
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>