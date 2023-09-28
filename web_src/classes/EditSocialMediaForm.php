<?php
require_once "GoogleChartDisplay.php";

class EditSocialMediaForm{
    public static function getForm($socialMediaData){
        $error = (isset($_SESSION["error"])) ? $_SESSION["error"] : "";
        $display = '
        <div class="w3-container w3-light-grey" style="padding:128px 16px">
            <div id="main" style="padding:12px 160px">
                <h1>Edit Social Media Links</h1>
                <div id="error">'.$error.'</div>';
        
        $display .= "<form method='post' action='update_social_media.php' class='w3-form'>";
        
        $display .= "Facebook: <input type='text' name='facebook' value='{$socialMediaData['facebook']}'><br>";
        $display .= "Instagram: <input type='text' name='instagram' value='{$socialMediaData['instagram']}'><br>";
        $display .= "Twitter: <input type='text' name='twitter' value='{$socialMediaData['twitter']}'><br>";
        $display .= "Snapchat: <input type='text' name='snapchat' value='{$socialMediaData['snapchat']}'><br>";
        $display .= "Pinterest: <input type='text' name='pinterest' value='{$socialMediaData['pinterest']}'><br>";
        $display .= "LinkedIn: <input type='text' name='linkedin' value='{$socialMediaData['linkedin']}'><br>";
        
        $display .= "<input type='submit' class='w3-button w3-red' id='saveBtn' name='saveBtn' value='Save Social Media Links'>";
        
        $display .= "</form>";
        $display .= "</div>";
        $display .= "</div>";
        
        return $display;
    }

    // Other functions for validation and processing can be added here as needed.
}
?>
