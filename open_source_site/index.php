<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Blue Jay Pantry";

require_once "includes/header.php";

?>

<body id="ContactBody">
    <div class="gradient-background">
        <div class="dark-background">
            <h4 class="bold">Welcome to our Open Source Project</h4>
            <p style="margin-bottom: 25px;">More text coming soon</p>
         
         </div>
    </div>

</body>
  
    <?php
    require_once "includes/sidebar.php";
    require_once "includes/footer.php";
    ?>