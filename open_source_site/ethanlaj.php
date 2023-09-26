<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Ethan Lajeunesse";

require_once "includes/header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <style>
        body {
            background: rgba(0,0,0,0.8);
            color: white;
        }
        div {
            animation: moveAndScale 10s infinite alternate;
        }
        .home {
            text-align: left;
            margin-top: 15px;
        }
        .team-section h1 {
            font-size: 2em;
            text-shadow: 2px 3px 5px black;
        }
        .section {
            font-size: 9em;
        }
        @keyframes moveAndScale {
            0% {
                transform: scale(10) translate(0, 0);
                opacity: 0.5;
            }
            25% {
                transform: scale(1.2) translate(20px, 0);
                opacity: 0.7;
            }
            50% {
                transform: scale(0.8) translate(-20px, 20px);
                opacity: 0.9;
            }
            75% {
                transform: scale(1.1) translate(20px, -20px);
                opacity: 0.7;
            }
            100% {
                transform: scale(1) translate(0, 0);
                opacity: 0.5;
            }
        }
    </style>
</head>
<body>
    <div class="home" id="homeDiv">
        <!-- Add your home icon or whatever you want here -->
    </div>
    <div class="team-section">
        <h1 id="titleText">Ethan Lajeunesse</h1>
        <div class="section" id="randomSection">
            Ethan Lajeunesse is a cool student. He is a senior Comp Sci major at Etown.
            <br><br>
            <a href="CS341Fall2023.php">Back to CS 341 - Fall 2023</a>
        </div>
    </div>

    <script>
        // Sine-wave text animation on title
        let textElement = document.getElementById('titleText');
        let originalText = textElement.textContent;
        let frequency = 0.1;
        
        function animateTitle() {
            let newText = '';
            for (let i = 0; i < originalText.length; i++) {
                let y = Math.sin((frequency * i) + (performance.now() * 0.005)) * 10;
                newText += `<span style="position: relative; top:${y}px">${originalText[i]}</span>`;
            }
            textElement.innerHTML = newText;
            requestAnimationFrame(animateTitle);
        }
        animateTitle();

        // Change opacity of the home div when mouse is over it
        let homeDiv = document.getElementById('homeDiv');
        
        homeDiv.addEventListener('mouseover', function() {
            this.style.opacity = 0.3;
        });
        
        homeDiv.addEventListener('mouseout', function() {
            this.style.opacity = 1;
        });

        // Random background color on section hover
        document.getElementById("randomSection").addEventListener('mouseover', function() {
            let randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
            this.style.backgroundColor = randomColor;
        });
    </script>

    <?php require_once "includes/sidebar.php"; ?>
</body>
</html>
