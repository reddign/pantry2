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
        <h1>FOUNDING TEAM</h1>
        <div class="section">The project was originally taken on by a team from Etown's CS341 (Software Engineering) in the Fall 2022.<BR></div>
        <span class="border"></span>
        <div class="pfp">
            <a ><img id="AdamPic" src="images\AdamID.jpg" alt="Adam Johnson" ></a>
            <a ><img id="AidenPic" src="images\AidenPFP.jpg" alt="Aiden Walmer" ></a>
            <a ><img id="AlexPic"src="images\ASF Etown.jpg" alt="Alexander Fox" ></a>
            <a ><img id="MattPic" src="images\MattPFP3.jpg" alt="Matthew Sutton"></a>
        </div>
    
        <div class="section" id="aj">
            <span class="name">Adam Johnson</span>
            <span class="border"></span>
            <p>
                Adam is a class of 2024 Computer Engineering student.
                Adam handled creating the structure of the database for the Blue Jay Pantry site.
                In his free time he enjoys playing spikeball and spending time with friends.
                One day Adam hopes to become a professional with computers and technology.
            </p>
        </div>
        
        <div class="section" id="aw">
            <span class="name">Aiden Walmer</span>
            <span class="border"></span>
            <p>
                Aiden is a class of 2024 Computer Science student.
                Aiden handled creating the login structure for the Blue Jay Pantry site.
                Being the President of the Spikeball club, he enjoys playing spikeball with his fellow club members
                and spending time with friends. After graduation Aiden aspires to become a full time web developer or software developer. 
            </p>
        </div>

        <div class="section" id="af">
            <span class="name">Alexander Fox</span>
            <span class="border"></span>
            <p>
                Alex is a class of 2024 Computer Science student.
                Alex handled creating the design of the user interface for the Blue Jay Pantry site.
                Alexander started his college career as a Computational Physics major and promptly changed his major to Computer Science after developing a love for coding. 
                Alex is a member of the Elizabethtown cross country and track teams and his hobies include running, coding, sailing, roller-blading, and eating food! 
                Alex enjoys spending time with friends and family, watching sports such as F1, Football, Hockey, or Soccer, and learning new things!
                After college Alex has aspirations to become either a software engineer or web developer.
            </p>
        </div>

        <div class="section" id="ms">
            <span class="name">Matthew Sutton</span>
            <span class="border"></span>
            <p>
                Matthew is a class of 2024 Computer Science student.
                Matthew handled the documentation and the building and implementation of the database for the Blue Jay Pantry site.
                In his free time, he enjoys spending time with friends and family, playing D&D, and reading.
                After graduation, Matthew plans on becoming a software engineer.
            </p>
        </div>
</div>
   
</body>

<?php
    require_once "includes/sidebar.php";
    ?>