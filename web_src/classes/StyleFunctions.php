<?php
/**
 * Function that puts json formated data to a url
 */
function putData($url, $data_json) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    $response = curl_exec($ch);
    curl_close($ch);
    if ( ! $response) {
        return false;
        }
 
        $message = $response;

    return $message; 
}
// Function to update social media links in the database
function updateSocialMediaLinks($userid, $pantry_name, $header_logo, $second_logo, $background_image, $nav_bg_color) {
    global $url, $api_key;
    // Perform database update here
    $url = $url."/data_src/api/site_vars/update.php";

    $data = array("APIKEY" => $api_key,"userid"=>$userid,"pantry_name"=>$pantry_name,"header_logo" => $header_logo,"second_logo"=>$second_logo,"background_image"=>$background_image,"nav_bg_color"=>$nav_bg_color);

    $data_json = json_encode($data);

            //use curl to send values to backend data following API:
        //data_src/doc.html
    $message = putData($url, $data_json);
    return $message;
}



?>

