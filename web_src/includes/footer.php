<!-- Footer -->
<footer class="w3-center w3-dark-blue w3-padding-64">
  <a href="index.php?page=about#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i><?php echo $translations["to_top_button"]?></a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa-brands fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
<html>
  <a href="https://www.linkedin.com/in/nolan-pettit/" target="_blank" >
      <i class="fa fa-linkedin w3-hover-opacity"></i>
</a>
</html>


  </div>
  
  <p> <?php echo $translations["powered_by"]?> <a href="../open_source_site/team.php" target="_blank" class="w3-hover-text-red"><?php echo $translations["etown_students_link"]?></a></p>
</footer>
 
<script>
function editInventoryItem(id){

  location.href = "index.php?page=edit&editID=" + id;

}
function addInventoryItem(){

location.href = "index.php?page=edit&editID=add";

}
function addItem(id){
 // alert("add cart item id " + id);
  location.href = "utils/addToCart.php?id="+id;

}

function removeItem(id){
  location.href = "utils/removeFromCart.php?id="+id;
  //alert("remove from cart item id " + id);

}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>