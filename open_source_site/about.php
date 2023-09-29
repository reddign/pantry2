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

    <!-- Free Food for Students in Need Paragraph -->
        <h1>Blue Jay Pantry</h1> 
        <p> 
            Elizabethtown College is committed to ensuring that all students have regular access to healthy food options. 
            The Blue Jay Pantry has been established by our Center for Community and Civic Engagement to provide our students with free, 
            non-perishable food items sourced by charitable donations from within our community. 
            <br>
            <br>
            Our College joins over 600 schools nationwide who operate an on-campus food pantry and is a member of the College and University Food Bank Alliance (CUFBA).
             CUFBA provides colleges and universities with support, training and resources to connect more students with the food and resources they need for educational success. <!-- hardcode -->
        </p>
    </div>
    <span class="border"></span>
    <div class="paragraph2">
        <h1>About The Program</h1> 
        <h2>Our Goals:</h2>
        <ul>
            <li>The pantry exists to help eliminate food insecurity at Elizabethtown College.</li> <!-- "Responsible" Paragrpah --> 
            <li>The pantry is intended to be accessible to all students in order to eliminate barriers 
                to access for students experiencing hunger and having difficulty buying food and will 
                operate in ways that maximize hospitality and privacy.</li> <!-- "Accesible" Paragraph -->
            <li>The pantry, in partnership with offices and programs on campus, will provide resources that 
                will help students create healthy meals.</li> <!-- "Healthy Meals" Paragraph-->
        </ul>
        <br>
        <span class="border"></span>



        <h2>How it Works:</h2>
        <p>The Blue Jay Pantry is accessible to all undergraduate and graduate Elizabethtown College students. 
            Should you require items while the College is closed, contact <a href="mailto:thompsonjavita@etown.edu">Javita Thompson</a>.</p>
        <br>
        <span class="border"></span>
        <!-- <br> -->
        <h2>Donate:</h2>
        <p>Please consider making a monetary donation using this link to help us keep the pantry stocked with new and fresh items for students. 
            Or use our <a href="https://a.co/dBWPRtS">Amazon Wish List</a> to purchase pantry items and send them to the Center for Community and Civic Engagement. 
            Or all donation items can be dropped off outside the Blue Jay Pantry BSC 251 or <a href="mailto:civicengagement@etown.edu">Center for Civic Engagement</a>.
            <br>
            <br>
            Please contact <a href="mailto:thompsonjavita@etown.edu">Javita Thompson</a> or the <a href="mailto:civicengagement@etown.edu">Center for Community and Civic Engagement</a> with any questions.</p>
        <br>
        <span class="border"> </span>
        <h2>Volunteer:</h2>
        <p>Contact the <a href="mailto:civicengagement@etown.edu">Center for Community and Civic Engagement</a> if you would like to volunteer with the Blue Jay Pantry or establish a food drive event.</p>
    </div>
</body>

<?php
    require_once "includes/sidebar.php";
    ?>