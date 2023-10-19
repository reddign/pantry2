<?php

/**
*  This class is designed to handle all communication with the database API.
*  This will prevent code from being duplicated to send the value.
*
*/
class DatabaseAPIConnection{

    /**
     * return string 
     */
    public static function get($url,$data){
        $getString = '?';
        foreach($data as $key=>$value){
            $getString .= $key."=".$value."&";
        }
        $returnedString = file_get_contents($url.$getString);
        return $returnedString;
    }
    public static function post($url,$data){
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
        
    }
    public static function put($url,$data){

        $data_json = json_encode($data);

        //use curl to send values to backend data following API:
        //data_src/doc.html
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
        return $response;
        
    }
    public static function delete($url,$data){
        
        $data_json = json_encode($data);

        //use curl to send values to backend data following API:
        //data_src/doc.html
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        if ( ! $response) {
            return false;
        }
        return $response;
    }
}

?>