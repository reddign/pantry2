<?PHP
require_once "GoogleChartDisplay.php";
// require_once "../../../../data_src/api/socialmedia/create.php"



class GeneralContent{

    public static function getAllProductsDisplay($products,$title="INVENTORY",$button="addtocart"){

       
        $html = "<div class='w3-container' style='padding:128px 10px'>";
        $html .=  "<h3 class='w3-center'>".$title."</h3>";
       
        
        $count = 0;
        $divComplete = true;
        if(is_array($products) && count($products)>0){
            
            foreach($products as $product){
                if($count%3==0){
                    $divComplete = false;
                    $html .= "<div class='w3-row-padding' style='margin-top:64px'>";
                }
                $html .= GeneralContent::getIndividualProductDisplay($product,$button);
                if($count%3==2){
                    $divComplete = true;
                    $html .= "</div>";
                }
                $count++;
            }
            if(!$divComplete){
                $html .= "</div>";
            }
            
        }
    
        
        $html .= "</div>";
        return $html;
               
    }
    public static function getIndividualProductDisplay($product,$button){
        $display = "<div class='w3-col l3 m6 w3-margin-bottom w3-center'>";
        $display .= "<div class='w3-card'>";
        //Image
        $display .= "<img  src='{$product->img}' alt='productImg' style='width:120px;height:160px;'><br>";
        ///Test comment
        if($button=="edit")
        {
            $jsaction = " onclick='editItem({$product->productID});' ";
            $buttonMessage = "Edit Item";
        }else if($button=="remove")
        {
            $jsaction = " onclick='removeItem({$product->productID});' ";
            $buttonMessage = "Remove from Cart";
        }else{
            $jsaction = " onclick='addItem({$product->productID});' ";
            $buttonMessage = "Add to Cart";
        }

        $display .= "<button class='w3-button w3-red' $jsaction type='button'>{$buttonMessage}</button>";
        $display .= "<p>{$product->productName}<br>";
        $display .= " Qty: {$product->quantity}</p>";
        $display .= "</div>";
        $display .= "</div>";
        return $display;    
    }
    public static function getEditItemForm($product){
      $error = (isset($_SESSION["error"]))?$_SESSION["error"]:"";
      $display = '
      <div class="w3-container w3-light-grey" style="padding:128px 6px">
          <div id="main" style="padding:12px 160px">
              <h1>Edit Item</h1>
              <div id="error">'.$error.'</div>';
      $display .= "<form method='post' action='index.php' class='w3-form'>";
      $display .= "Product ID: {$product->productID}<br>";
      $display .= "Product Name: <input type='text' name='name' value='{$product->productName}'><br>";
      $display .= "Quantity: <input type='text' name='qty' value='{$product->quantity}'><br>";
      $display .= "Current Image:";
      //Image
      $display .= "<img  src='{$product->img}' alt='productImg' style='width:120px;height:160px;'><br>";
      
      
      $display .= "Upload New Image: <input type='file' name='filename'><br>";
      $display .= "<input type='submit' class='w3-button w3-red' id='saveBtn' name='saveBtn' value='Save Product Info'>";
      $display .= "</form>";
      $display .= "</div>";
      $display .= "</div>";
      return $display;    
  }
    public static function getGeneralMessage($message="Page Not Found.",$size="large"){
        $error = (isset($_SESSION["error"]))?$_SESSION["error"]:"";
        if($size=="medium"){
          $headersize = "h3";
          $height = "10";
        }elseif($size=="small"){
          $headersize = "h6";
          $height = "6";
        }else{
          $headersize = "h1";
          $height = "16";
        }
        return '
        <div class="w3-container w3-light-grey" style="padding:'.$height.'px 16px">
            <div id="main">
                <'.$headersize.'>'.$message.'</'.$headersize.'>
            </div>
        </div>';
    }
    public static function getLoginForm(){
        $error = (isset($_SESSION["error"]))?$_SESSION["error"]:"";
        return '
        <div class="w3-container w3-light-grey" style="padding:128px 16px">
            <div id="main">
                <h1>Admin Login</h1>
                <div id="error">'.$error.'</div>
                <form action="index.php" method="POST" class="w3-form">
                    <label id="usernameLabel">Username:</label><br>
                    <input class="w3-input w3-border" id="username" name="user" placeholder="Type your username" required>
                    <br>
                    <br>
                    <label id="passwordLabel">Password:</label><br>
                    <input class="w3-input w3-border" id="password" name="pass" type="password" placeholder="Type your password" required>
                    <br>
                    <br>
                    <input type="submit" class="w3-button w3-red w3-padding-large" id="loginBtn" name="loginBtn" value="LOGIN">
                    <!-- <button>LOGIN</button> -->
                </form>
            </div>
        </div>
        ';
    }
    public static function getAbout(){
      global $logo2, $pantryName, $paragraphHeader, $paragraph, $goal1Header, 
      $goal1Body, $goal2Header, $goal2Body, $goal3Header, $goal3Body, $pantryHours, $pantryLocation, $pantryCenter, $pantryEmail;
        return '<!-- Header with full-height image -->
        <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
          <div class="w3-display-left w3-text-white" style="padding:48px">
            <span class="w3-jumbo w3-hide-small">'.$pantryName.'</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Blue Jay Pantry</span><br>
            <span class="w3-large">Free Food for Students In Need.</span>
            <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn more</a></p>
          </div> 
          <div class="w3-display-bottomleft w3-text-white w3-large" style="padding:24px 48px">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa-brands fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
          </div>
        </header>
        <!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT</h3>
  <div class="w3-center w3-col m6">
  <img  src="'.$logo2.'" style="width:75%">
  </div>
  <div class="w3-col m6">
  <p class="w3-center w3-large">'.$paragraphHeader.'</p>
  <p class="w3-center w3-large">'.$paragraph.'</p>

 </div> 

  <h3 class="w3-center">OUR GOALS</h3>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-third">
      <i class="fa-solid fa-utensils w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">'.$goal1Header.'</p> 
      <p>'.$goal1Body.'</p>
    </div>
    <div class="w3-third">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">'.$goal2Header.'</p>
      <p>'.$goal2Body.'</p>
    </div>
    <div class="w3-third">
      <i class="fa-solid fa-seedling w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">'.$goal3Header.'</p>
      <p>'.$goal3Body.'</p>
    </div>
    
  </div>
</div>
<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">140+</span>
    <br>Students Helped
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">55,432+</span>
    <br>Items Distributed
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">89+</span>
    <br>Meals Delivered
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">51+</span>
    <br>Families Fed
  </div>
</div>

<!-- Promo Section - "Accessible" -->
<div class="w3-container w3-light-white" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>We are accessible</h3>
      <p>Pantry Hours:<BR>
      '.$pantryHours.'<BR>
	  <BR>
      Location:<BR>
      '.$pantryLocation.'<BR>
	  <BR>
Contact Information:<BR>
'.$pantryCenter.' <BR>
 Email: '.$pantryEmail.' </p>
      <p><a href="index.php?page=products" class="w3-button w3-red"><i class="fa fa-th"> </i> View Our Inventory</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="images/food-pantry.jpg" alt="Pantry Shelves Image" width="700" height="394">
    </div>
  </div>
</div>

<!-- Donate Section -->
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="donate">
  <h3>DONATIONS</h3>
  <p class="w3-large">We accept many types of donations.</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Food</li>
        <li class="w3-padding-16">Cereals/Breads</li>
        <li class="w3-padding-16">Diary Products</li>
        <li class="w3-padding-16">Fresh Produce</li>
        <li class="w3-padding-16">Snacks</li>
        <li class="w3-padding-16">Health Care Items
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">Find Out More</button>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-blue w3-xlarge w3-padding-48">Money</li>
        <li class="w3-padding-16">Cash/Checks</li>
         <li class="w3-padding-16">PayPal/Venmo</li>
        <li class="w3-padding-16">Automatic Donation</li>
      
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">Donate Here</button>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Time</li>
        <li class="w3-padding-16">Stock Shelves</li>
        <li class="w3-padding-16">Help Guests</li>
        <li class="w3-padding-16">Process Donations</li>
        <li class="w3-padding-16">Manage Inventory</li>
    
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i>Elizabethtown College, Brossman Center</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: mail@mail.com</p>
    <br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-red" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
   
  </div>
</div>';

    }
    

    public static function getContact(){
        return '<div id="ContactBody">
            <div class="gradient-background">
                <div class="dark-background">
                <h4 class="bold">Pantry Hours:</h4>
                <p style="margin-bottom: 25px;">Pantry is open 24/7</p>
                <h4 class="bold">Location:</h4>
                <p style="margin-bottom: 25px;">Brossman Commons (BSC) 251</p>
                <h4 class="bold">Contact Information:</h4>
                <p >Center for Community and Civic Engagement | <a href="mailto:civicengagement@etown.edu">civicengagement@etown.edu</a></p>
                <p style="margin-bottom: 25px;">Javita Thompson | <a href="mailto:thompsonjavita@etown.edu">thompsonjavita@etown.edu</a></p>
                </div>
            </div>
        </div>';
    }
    public static function getReportDisplay($data,$type){


        $content = '';
        switch($type){
            case 'ByCategory':
                $content .= GoogleChartDisplay::getByCategoryReport($data);
                break;
            case 'ByProduct':
                $content .= GoogleChartDisplay::getTotalReport($data);
                break;
            default:
                $content .= GoogleChartDisplay::getTotalReport($data);

        }
        
        return $content;
        
    }

    public static function getSocialMediaUpdateForm() {
      // this function creates the social media tags and save button
      $content = '
          <div class="w3-container" style="padding: 128px 10px">
              <h1>Update Social Media Links</h1>
              <form method="POST" action="update_social_media.php">
                  <label for="facebook">Facebook:</label>
                  <input type="text" name="facebook" id="facebook"><br>

                  <label for="twitter">Instagram:</label>
                  <input type="text" name="instagram" id="twitter"><br>

                  <label for="twitter">Twitter:</label>
                  <input type="text" name="twitter" id="twitter"><br>

                  <label for="twitter">Snapchat:</label>
                  <input type="text" name="snapchat" id="twitter"><br>

                  <label for="twitter">Pinterest:</label>
                  <input type="text" name="pinterest" id="twitter"><br>

                  <label for="twitter">LinkedIn:</label>
                  <input type="text" name="linkedin" id="twitter"><br>

                  <input type="submit" value="Save">
              </form>
          </div>';
  
      return $content;
  }
  
  public static function getParagraphUpdateForm() {
    
      $content = '
      <div class="w3-container" style="padding: 128px 10px">
          <h1>Update Paragraphs in Website</h1>

            <label for="paragraphHeader">Main Paragraph Header:</label>
            <input type="text" name="paragraphHeader" id="paragraphHeader"><br>

            <label for="paragraph">Main Paragraph:</label>
            <input type="text" name="paragraph" id="paragraph"><br>

            <label for="goal1Header">Goal 1 Header:</label>
            <input type="text" name="goal1Header" id="goal1Header"><br>

            <label for="goal1Body">Goal 1 Body:</label>
            <input type="text" name="goal1Body" id="goal1Body"><br>

            <label for="goal2Header">Goal 2 Header:</label>
            <input type="text" name="goal2Header" id="goal2Header"><br>

            <label for="goal2Body">Goal 2 Body:</label>
            <input type="text" name="goal2Body" id="goal2Body"><br>

            <label for="goal3Header">Goal 3 Header:</label>
            <input type="text" name="goal3Header" id="goal3Header"><br>

            <label for="goal3Body">Goal 3 Body:</label>
            <input type="text" name="goal3Body" id="goal3Body"><br>

            <label for="pantryHours">Pantry Hours:</label>
            <input type="text" name="pantryHours" id="pantryHours"><br>

            <label for="pantryLocation">Pantry Location:</label>
            <input type="text" name="pantryLocation" id="pantryLocation"><br>

            <label for="pantryCenter">Pantry Center:</label>
            <input type="text" name="pantryCenter" id="pantryCenter"><br>

            <label for="pantryEmail">Pantry Email:</label>
            <input type="text" name="pantryEmail" id="pantryEmail"><br>

            <input type="submit" value="Save">
      </div>';
    
    return $content;
  }

  public static function getColorForm() {
    //$content = "colorForm";

    /* ***** To Do ******
    // Make the entered values link to and change values in the config file.
    */
    
      $content = '
      <div class="w3-container" style="padding: 128px 10px">
          <h1>Update Color Scheme</h1>
            <label for="logo1">Logo 1:</label>
            <input type="text" name="logo1" id="logo1"><br>

            <label for="logo2">Logo 2:</label>
            <input type="text" name="logo2" id="logo2"><br>

            <label for="backgroundImage">Background Image:</label>
            <input type="text" name="backgroundImage" id="backgroundImage"><br>

            <label for="pantryName">Pantry Name:</label>
            <input type="text" name="pantryName" id="pantryName"><br>

            <label for="navBGColor">Navigation Background Color:</label>
            <input type="text" name="navBGColor" id="navBGColor"><br>

            <input type="submit" value="Save">
      </div>';
    
    return $content;
  }

  public static function getLogoForm() {
    $content = '
    <div class="w3-container" style="padding: 128px 10px">
      <h2>Upload your logo</h2>
      <form action="/action_page.php">
        <input type="file" id="myFile" name="filename">
        <input type="submit">
      </form>
    </div>';
    return $content;
  }



}
?>
