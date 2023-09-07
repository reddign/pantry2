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
        <span class="border"></span>
        <div class="section">In the Fall of 2022, four students in the Software Engineering Class at Elizabethtown College met with Javita Thompson to hear her vision for a software system that would meet the data needs of her Food Pantry on campus.  Alex Fox, Adam Johnson, Matt Sutton, and Aiden Walmer created the initial database model and web design for the project. <BR><BR>
        <a href="foundingteam.php"><img src="images/foundingTeamAtWork.jpg" style="width:400px;"><BR><BR> Meet the Founding Team</a>
        </div>

    <div>
        <h1>SPRING 2023</h1>
        <span class="border"></span>
        <div class="section">Alex and Matt further refactored the project in the Spring of 2023 as part of CS 409 (Advanced Database Systems).</div>
        
        
    </div>
    <div>
        
        <h1>SUMMER 2023</h1>
        <span class="border"></span>
        <div class="section">Professor Reddig and Matt Sutton worked on an expansion of the software's vision in the Summer of 2023.  The data and web code were seperated. Starter code for Andriod and IOS apps were started.</div>
        
        
    </div>
    <div>
        
        <h1>FALL 2023<BR>Software Engineering<BR>Class Project</h1>
        <span class="border"></span>
        <div class="section">The project then became the work for the entire Fall 2023 class. Students were presented with documentation and checked out the repository in Git.  They took on tasks and moved things forward for the first 3 weeks of class.  Then another team took on the project for the rest of the semester.
        <a href="CS341Fall2023.php"><img src="images/CS341Fall2023B.jpg" style="width:400px;"><BR><BR> Meet CS 341 Fall 2023</a>
       
        </div>
        
        
    </div>
    <div>
        
        <h1>Going Open Source in 2024 and Beyond</h1>
        <span class="border"></span>
        <div class="section">The project went into use in 2024 and became an open source project sponsored by <i>Educate for Service</i>.  The code base is now available for any food pantry to download and implement.  It continues to be maintained by former Etown Blue Jays and other's that believe in the motto "Educate for Service" from around the world.  Want to get involved? Contact <a href="contact.php">Educate for Service.</a></div>
        
        
    </div>
</div>
</body>

<?php
    require_once "includes/sidebar.php";
    ?>