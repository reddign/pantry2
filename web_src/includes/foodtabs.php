<div class="w3-container w3-dark-blue w3-card" style="padding:40px 16px">
</div>
<div class="w3-bar w3-dark-blue w3-card">
    <div class="inventoryTabs">
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=<?PHP echo $page ?>&catID=1">Breakfast Foods</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=<?PHP echo $page ?>&catID=2">Canned Goods</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=<?PHP echo $page ?>&catID=3">Fresh Foods</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=<?PHP echo $page ?>&catID=4">Snacks</a>
            <a class="w3-bar-item w3-button w3-wide" href="index.php?page=<?PHP echo $page ?>&catID=5">Wellness Products</a>
    </div>
<?PHP
if($useCategoryTabs){

    $fullUrl = $url."/data_src/api/category/read.php";
    $vars = ["APIKEY"=>$api_key];
    $web_string = DatabaseAPIConnection::get($fullUrl,$vars);
    
                
    $categories = json_decode($web_string);

    echo '<div class="inventoryTabs">';
    foreach($categories as $category){
        echo '<a class="tab" href="index.php?page=<?PHP echo $page ?>&catID='.$category->categoryID.'">'.$category->categoryType.'</a>';
    }
    echo '</div>';

}
?>
</div>