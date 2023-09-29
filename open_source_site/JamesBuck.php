<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "James Buck";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>James Buck</h1>
        <div class="section">James Buck is a 2nd year Computer Science Student who hopes to graduate in late 2025.
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
        
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>