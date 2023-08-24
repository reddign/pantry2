<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Michael Kennedy";

require_once "includes/header.php";


?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap');

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f6f7fb;
        margin: 0;
        padding: 0;
        transition: all 0.3s;
    }
    .home {
        display: flex;
        justify-content: center;
        margin-top: 40px;
        animation: fadeIn 1s;
    }
    .home img {
        cursor: pointer;
        transition: transform 0.3s;
    }
    .home img:hover {
        transform: scale(1.1);
    }
    .team-section {
        background-color: #fff;
        max-width: 850px;
        margin: 30px auto;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border-radius: 12px;
        animation: slideUp 1s;
    }
    .team-section h1 {
        text-align: center;
        color: #2d2d2d;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .team-section p {
        text-align: center;
        color: #555;
        font-weight: 300;
    }
    .team-section a {
        color: #0077b6;
        text-decoration: none;
        transition: color 0.3s;
    }
    .team-section a:hover {
        color: #005083;
    }
    .section {
        margin-top: 30px;
    }

    /* Animations */
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    @keyframes slideUp {
        from {opacity: 0; transform: translateY(40px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<body>
    <div class="home">
        <a href="https://bluejaypantry.etowndb.com/src/homePage/index.php">
            <img src="images\home-big.png" alt="home icon" height="75px">
        </a>
    </div>
    <div class="team-section">
        <h1>Michael Kennedy</h1>
        <a href="https://www.linkedin.com/in/michaelpkennedy1/"><p>LinkedIn</p></a>
        <div class="section">
            Michael Kennedy is a senior CS major who loves to golf.
            <br><br>
            <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>   
        </div>
    </div>
</body>

<?php
    require_once "includes/sidebar.php";
?>
