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
        background-color: #36b4e5;
        max-width: 850px;
        margin: 30px auto;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border-radius: 12px;
        animation: slideUp 1s;
    }
    .team-section p {
        text-align: center;
        color: #555;
        font-weight: 300;
    }

    .section {
        margin-top: 30px;
    }

.home img {
    animation: spin 10s infinite linear, pulse 1.5s infinite ease-in-out;
}

.team-section h1 {
    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
    transform: translate3d(0, 0, 0);
    text-align: center;
    backface-visibility: hidden;
    perspective: 1000px;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.home {
    position: absolute;
    top: 2%;
    left: 2%;
    transition: transform 0.3s;
}

.home:hover {
    transform: scale(1.1);
}

.home img {
    border: 5px solid #3498db;
    border-radius: 50%;
    box-shadow: 0px 0px 15px rgba(52, 152, 219, 0.5);
    animation: spin 10s infinite linear, pulse 1.5s infinite ease-in-out;
}

.team-section h1 {
    color: #fff;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
    transform: translate3d(0, 0, 0);
    text-align: center;
    backface-visibility: hidden;
    perspective: 1000px;
}

.team-section a {
    color: #f39c12;
    text-decoration: none;
    transition: color 0.3s;
}

.team-section a:hover {
    color: #f1c40f;
}

.team-section .section {
    margin-top: 20px;
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    color: #2c3e50;
}

.profilePic{
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin: 0 auto;
    display: block;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
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
    /* Crazy Spinning Logo */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Pulse Animation */
@keyframes pulse {
    0% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.1); opacity: 1; }
    100% { transform: scale(1); opacity: 0.7; }
}

/* Shake Animation */
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
    20%, 40%, 60%, 80% { transform: translateX(10px); }
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
        <a href="https://www.linkedin.com/in/michaelpkennedy1/"><img class="profilePic" src="https://media.licdn.com/dms/image/D4E03AQHTKjukdM-aYQ/profile-displayphoto-shrink_800_800/0/1666268932255?e=1698278400&v=beta&t=1CNvumIsHjVdK5WoaTTVskZocgqWgNNxWetQdzr7Ox4" alt="Michael Kennedy"></a>
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
