<div class="w3-container w3-dark-blue w3-card" style="padding:40px 16px">
</div>
<div class="w3-bar w3-dark-blue w3-card">
    
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=reports&graphType=ByProduct">BY PRODUCT</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=reports&graphType=ByCategory">BY CATEGORY</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=reports&graphType=ByDateRange">BY DATE RANGE</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=reports&graphType=ByUserInfo">BY USER INFO</a>
        </div>
<?php
if($useCategoryTabs){

    $web_string = file_get_contents($url."/data_src/api/category/read.php?APIKEY={$api_key}");
                
    $categories = json_decode($web_string);

    echo '<div class="w3-bar w3-dark-blue w3-card">';
    foreach($categories as $category){
        echo '<a class="w3-bar-item w3-button w3-wide" href="index.php?page=reports&graphType=ByCategory&catID='.$category->categoryID.'">'.$category->categoryType.'</a>';
    }
    echo '</div>';
    
}
?>
</div>