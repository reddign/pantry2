<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Aj Botticelli";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>Aj Botticelli</h1>
        <div class="section">Aj Botticelli is a Junior Honors Student. He is a Computer Science and Data Science Major. He also plans to graduate a year early! Hello! 
       <BR><BR>
        <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
    </div>
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>