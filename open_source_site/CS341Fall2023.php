<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Jay Pantry Contributors";

require_once "includes/header.php";
?>

<body>
    <div class="home">
        <!-- <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a> -->
    </div>
    <div class="team-section">
        <h1>CS 341 - Software Engineering - Fall 2023</h1>
        <div class="section" style="text-align:center">Our class included:<BR>
        <span class="border"></span>
      
            <a href='janedoe.php'>Jane Doe</a><BR>
            <a href= 'anfal_alhussaini.php'>Anfal Al-Hussaini</a><br>
            AJ Botticelli<br>
            Nathan Brightup<br>
            <a href='JamesBuck.php'>James Buck</a><BR>
            Mina Campos<br>
            Phillip Goldberg<br>
            Clayton Greer<br>  
            Sam Huhn<br>
            Michael Kennedy<br>
            Ethan Lajeunesse<br>
            Emma Maykut<br>
            Stephanie Motz<br>
            Isabel Pacheco Mattivi<br>
            Melissa Patton<br>
            <a href='nolan_pettit.php'>Nolan Pettit</a><BR>
            Giovanni Raso<br>
            Wesley Ryan<br>
            Danielle Strausburger<br>
            <a href='tanner_wetzel.php'>Tanner Wetzel</a><BR>
            Toma Yasuda<br>
        </div>
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>
