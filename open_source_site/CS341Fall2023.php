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
            <a href="phillipgoldberg.php">Phillip Goldberg</a><br>
            Clayton Greer<br>  
            <a href="SamHuhn.php">Sam Huhn</a><br>
            <a href= 'michaelkennedy.php'>Michael Kennedy</a><br>
            <a href='ethanlaj.php'>Ethan Lajeunesse</a><br>
            Emma Maykut<br>
            <a href='stephaniemotz.php'>Stephanie Motz</a><br>
            <a href='isabelpmattivi.php'>Isabel Pacheco Mattivi</a><br>
            <a href='MelissaPatton.php'>Melissa Patton</a><BR>
            <a href='nolan_pettit.php'>Nolan Pettit</a><BR>
            Giovanni Raso<br>
            Wesley Ryan<br>
            <a href='danistrausburger.php'>Danielle Strausburger</a><br>
            <a href='tanner_wetzel.php'>Tanner Wetzel</a><BR>
            <a href='toma_yasuda.php'>Toma Yasuda</a><br>
            <a href='reddig.php'>Prof Reddig</a><br>
        </div>
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>
