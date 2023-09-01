<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Phillip Goldberg";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>Phillip Goldberg</h1>
        <img style="position:relative;top:-25px;"src="images/PhillipPFP.jpg"/>
        <div class="section"><br>Phillip Goldberg is an Information Systems Major at Elizabeth College.
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
        
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>