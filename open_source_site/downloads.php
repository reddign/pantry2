<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Contact Blue Jay Pantry";

require_once "includes/header.php";

?>

<body id="ContactBody">
    <div class="gradient-background">
        <div class="dark-background">
            
            <h4 class="bold">Downloads:</h4>
            <p >Latest Version (Beta) | <a href="release/latest.zip">Latest Version</a></p>
            <p style="margin-bottom: 25px;">Last Stable Release | <a href="release/stable.zip">Last Stable Release</a></p>
                  </div>
    </div>

</body>

<?php
    require_once "includes/sidebar.php";
    ?>