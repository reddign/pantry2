<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-dark-blue w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide"><img src="images/ETOWN_Footer_Logo.png" width='100px.'></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php?page=about#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="index.php?page=cart" class="w3-bar-item w3-button"><i class="fa fa-cart-shopping"></i> MY CART</a>
      <a href="index.php?page=products" class="w3-bar-item w3-button"><i class="fa fa-th"></i> INVENTORY</a>
      <a href="index.php?page=about#donate" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> DONATE</a>
      <a href="index.php?page=about#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
      <?php //Hidden Admin Tabs
        if (isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"]== "YES") {
        ?>
          <a href="index.php?page=edit" class="w3-bar-item w3-button">Edit Inventory</a>
          <a href="index.php?page=reports" class="w3-bar-item w3-button">Reports</a>
          <a href="index.php?page=settings" onclick="w3_close()" class="w3-bar-item w3-button">Settings</a>
          <a href="index.php?page=logout" class="w3-bar-item w3-button" id="logout">Logout</a>
        <?php
        }else{
          ?>
           <a href="index.php?page=login" class="w3-bar-item w3-button"><i class="fa fa-key"></i>LOGON</a>
  
          <?PHP
        }
        ?>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.php?page=about#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="index.php?page=cart" onclick="w3_close()" class="w3-bar-item w3-button">MY CART</a>
  <a href="index.php?page=products" onclick="w3_close()" class="w3-bar-item w3-button">INVENTORY</a>
  <a href="index.php?page=about#donate" onclick="w3_close()" class="w3-bar-item w3-button">DONATE</a>
  <a href="index.php?page=about#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <?php //Hidden Admin Tabs
        if (isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"]== "YES") {
        ?>
          <a href="index.php?page=edit" onclick="w3_close()" class="w3-bar-item w3-button">Edit Inventory</a>
          <a href="index.php?page=reports" onclick="w3_close()" class="w3-bar-item w3-button">Reports</a>
          <a href="index.php?page=settings" onclick="w3_close()" class="w3-bar-item w3-button">Settings</a>
          <a href="index.php?page=logout" onclick="w3_close()" class="w3-bar-item w3-button" id="logout">Logout</a>
        <?php
        }else{
          ?>
           <a href="index.php?page=login" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-key"></i>LOGON</a>
  
          <?PHP
        }
        ?>
</nav>