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
function updateSocialMediaLinks($adminId, $facebook, $instagram, $twitter, $snapchat, $pinterest, $linkedin) {
    global $url, $api_key;
    // Perform database update here
    $url = $url."/data_src/api/socialmedia/update.php";

    $data = array("APIKEY" => $api_key,"admin_id"=>$adminId,"facebook" => $facebook,"instagram"=>$instagram,"twitter"=>$twitter,"snapchat"=>$snapchat,"pinterest"=>$pinterest,"linkedin"=>$linkedin);

    $data_json = json_encode($data);

            //use curl to send values to backend data following API:
        //data_src/doc.html
    $message = putData($url, $data_json);

    return $message;
}


?>

