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
        <span class="border"></span>
        <img src="images/CS341Fall2023.jpg" style="width:800px;" usemap="#students"><BR><BR>
        <map name="students">
            <area shape="rect" coords="85,5,121,43" alt="Clock" href="clock.php">
            <area shape="rect" coords="210,73,237,104" alt="Tanner Wetzel" href="tanner_wetzel.php">
            <area shape="rect" coords="585,72,622,114" alt="James Buck" href="JamesBuck.php">
        </map>
        <div class="section" style="text-align:center">Our class included:<BR>
        <span class="border"></span>
        From Left to Right:
        <a href = 'minacampos.php'>Mina Campos</a>,  
        <a href= 'michaelkennedy.php'>Michael Kennedy</a>,
        <a href='MelissaPatton.php'>Melissa Patton</a>,
        <a href="phillipgoldberg.php">Phillip Goldberg</a>,
            <a href= 'anfal_alhussaini.php'>Anfal Al-Hussaini</a>,
            <a href = 'ajbotticelli.php'>AJ Botticelli</a>,
            <a href='tanner_wetzel.php'>Tanner Wetzel</a>,
            <a href = 'nathanbrightup.php'>Nathan Brightup</a>,
            <a href="Clayton_Greer.php">Clayton Greer</a>,
            <a href="nolan_pettit.php">Nolan Pettit</a>,
            Wesley Ryan,
            <a href = 'emmamaykut.php' > Emma Maykut </a>,
            <a href='ethanlaj.php'>Ethan Lajeunesse</a>,
            <a href='danistrausburger.php'>Danielle Strausburger</a>,
            <a href="SamHuhn.php">Sam Huhn</a>,
            <a href='stephaniemotz.php'>Stephanie Motz</a>,
            <a href='JamesBuck.php'>James Buck</a>,
            <a href='isabelpmattivi.php'>Isabel Pacheco Mattivi</a>,
            <a href='gioraso.php'>Giovanni Raso</a>,
            <a href='toma_yasuda.php'>Toma Yasuda</a><BR>
            
             Not pictured: <a href='reddig.php'>Prof Reddig</a><br>
        </div>
    
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>
