<?php
class GoogleChartDisplay{

    
    public static function getByCategoryReport($data){
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Products Grabbed Within A Category","Total Amount For Each Product","Product Types");
        return $content;
    }
    public static function getTotalReport($data){

        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Total Food Grabbed","Total Amount","CategoryID"); 
        return $content;
        
    }
    public static function getByDateReport($data){
        $content = GoogleChartDisplay::getGoogleJSForBarGraph($data,"Orders on specific dates","Total Products","Date"); 
       
          return $content;
    }
    private static function getGoogleJSForBarGraph($data,$title,$xscale,$yscale){
        $content ='
        <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart); 
        function drawChart() {
        var data = google.visualization.arrayToDataTable([';
        $content .= GoogleChartDisplay::getJSArrayData($data,$xscale,$yscale);
        $content .= ']);';

        $content .= 'var chart = new google.visualization.BarChart(document.getElementById("Bar"));
        chart.draw(data, {width: 1000, height: 540, is3D: true, title: "'.$title.'"});
        
        }
           
          </script>';
          $content .= GoogleChartDisplay::getDiv();
          return $content;
    }
    private static function getJSArrayData($data,$titlex,$titley){
        $array_string = '["'.$titlex.'","'.$titley.'"],';
        foreach($data as $info){
            $array_string .= "['".$info->productName."',".$info->total."],";
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