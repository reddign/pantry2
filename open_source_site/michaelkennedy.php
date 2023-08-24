<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Michael Kennedy";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a>
    </div>
    <div class="team-section">
        <h1>Michael Kennedy</h1>
        //add linkedIn
        <a href="https://www.linkedin.com/in/michaelpkennedy1/"><p>LinkedIn</p></a>

        <div class="section">Michael Kennedy is a senior CS major who loves to golf. .
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
        
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>