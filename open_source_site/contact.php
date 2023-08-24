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
            <h4 class="bold">Educate for Service</h4>
            <p style="margin-bottom: 25px;">The Blue Jay Pantry Software is sponsored by the nonprofit organization: <i>Educate for Service</i>.</p>
            <h4 class="bold">Location:</h4>
            <p style="margin-bottom: 25px;">Educate for Service<BR>
        P.O. Box 123<BR>
        Lancaster, PA 17601<BR></p>
            <h4 class="bold">Contact Information:</h4>
            <p >Development Questions | <a href="educateforservice.github.org">Educate for Service Git Hub</a></p>
            <p style="margin-bottom: 25px;">Donations | <a href="mailto:donations@foodmatters.org">donations@educateforservice.org</a></p>
        </div>
    </div>

</body>

<?php
    require_once "includes/sidebar.php";
    ?>