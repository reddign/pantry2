<?php
class GoogleChartDisplay{

    
    public static function getByCategoryReport($data){
        $type="category";
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Products Grabbed Within A Category","Total Amount For Each Product","Product Types", $type);
        return $content;
    }
    public static function getTotalReport($data){
        $type="total";
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Total Food Grabbed","Total Amount","CategoryID", $type); 
        return $content;
        
    }
    public static function getByDateReport($data){
        $type="date";
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Orders on specific dates","Total Products","Date", $type); 
       
          return $content;
    }

    public static function getUserData($data) {
        $type="userInfo";
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data, "User Info", "User Types", "Total Users", $type);
        return $content;
    }
    
    private static function getGoogleJSForBarGraph($data,$title,$xscale,$yscale, $type){
        $content ='
        <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart); 
        function drawChart() {
        var data = google.visualization.arrayToDataTable([';
        $content .= GoogleChartDisplay::getJSArrayData($data,$xscale,$yscale, $type);
        $content .= ']);';

        $content .= 'var chart = new google.visualization.BarChart(document.getElementById("Bar"));
        chart.draw(data, {width: 1000, height: 540, is3D: true, title: "'.$title.'"});
        
        }
           
          </script>';
          $content .= GoogleChartDisplay::getDiv();
          return $content;
    }
    private static function getJSArrayData($data,$titlex,$titley, $type){
        $array_string = '["'.$titlex.'","'.$titley.'"],';
        if($type==="userInfo"){
            foreach($data as $info) {
                $userID = isset($info->userID) ? $info->userID : '';
                $children = isset($info->{'SUM(children)'}) ? $info->{'SUM(children)'} : 0;
                $adult = isset($info->{'SUM(adult)'}) ? $info->{'SUM(adult)'} : 0;
                $senior = isset($info->{'SUM(senior)'}) ? $info->{'SUM(senior)'} : 0;
                $firstuse = isset($info->{'SUM(firstuse)'}) ? $info->{'SUM(firstuse)'} : 0;
        
                $array_string .= "['Children',".$children."],";
                $array_string .= "['Adult',".$adult."],";
                $array_string .= "['Senior',".$senior."],";
                $array_string .= "['First Use',".$firstuse."],";
            }
        }else{
            foreach($data as $info){
                $array_string .= "['".$info->productName."',".$info->total."],";
            }
        }
        return $array_string;
    }
    private static function getDiv(){
         return 
         '<div class="w3-container w3-light-white" style="padding:128px 16px"><div class="container-fluid">
            <div id="Bar" style="width: 100%; height: 500px;"></div>
            </div></div>';
    }


}
?>