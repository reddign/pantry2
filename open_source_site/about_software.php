<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "About BlueJay Pantry";

require_once "includes/header.php";

?>


<body id = "AboutBody">
    </div>
    <!-- <div class="bannerClass">
        <img id="headerImg" src="images\pantry-header2.jpg">
    </div> -->
    <!-- <span class="border"></span> -->
    <div class="paragraph1">
        <h1>Blue Jay Pantry Software</h1>
        <p>
            Our software was developed for a food pantry located on the campus of Elizabethtown College.  The staff of the Blue Jay Pantry dreamed of
            having an app that would allow them to share and maintain their inventory digitally and streamline their reporting processes.  The budding software engineers on the college campus took on the task.
            <br><BR>
            This project eventually became the open source project available to you today.  Please try out the demo that is reset every 24 hours.
            Then download the software and follow the instructions for installing this food pantry database for your own food bank.
            <BR>
           
        </p>
    </div>
    <div class="paragraph2">
   
        <p>
           Want to know more about the original Blue Jay Pantry?  
            <a href="about.php">Read more here ...</a>
        </p>
    </div>
</body>

<?php
    require_once "includes/sidebar.php";
    ?>