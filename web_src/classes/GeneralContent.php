<?PHP
require_once "GoogleChartDisplay.php";

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
    
        if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"]== "YES"  ){
          return '
          <div class="w3-container w3-light-grey" style="padding:'.$height.'px 16px">
              <div id="main">
                  <'.$headersize.'>'.$message.'</'.$headersize.'>
              </div>
          </div>';
        }else{
          return '
          <div class="w3-container w3-light-grey" style="padding:'.$height.'px 16px">
              <div id="main">
                  <'.$headersize.'>'.$message.'</'.$headersize.'>
              </div>
              <form action="index.php?page=login" method="POST">
                  <input type="submit" class="w3-button w3-blue w3-padding-large" id="backToUserLoginBtn" name="backToUserLoginBtn" value="Back to Login">
              </form>
          </div>';
        }
    }
    public static function getLoginForm(){
      $error = (isset($_SESSION["error"]))?$_SESSION["error"]:"";
      $adminLogin = (isset($_SESSION["adminLogin"]))?$_SESSION["adminLogin"]:"";
      if($adminLogin){
      return '
      <div class="w3-container w3-light-grey" style="padding:128px 16px">
          <div id="main">
              <h1>Admin Login</h1>
              <div id="error">'.$error.'</div>
              <form action="index.php" method="POST" class="w3-form">
                  <label id="usernameLabel">Username:</label><br>
                  <input class="w3-input w3-border" id="username" name="user" placeholder="Type your student ID" required>
                  <br>
                  <br>
                  <label id="passwordLabel">Password:</label><br>
                  <input class="w3-input w3-border" id="password" name="pass" type="password" placeholder="Type your password" required>
                  <br>
                  <br>
                  <input type="submit" class="w3-button w3-red w3-padding-large" id="loginBtn" name="loginBtn" value="LOGIN">
              </form>
              <br>
              <form action="index.php" method="POST">
                  <input type="submit" class="w3-button w3-blue w3-padding-large" id="backToUserLoginBtn" name="backToUserLoginBtn" value="Back to User Login">
              </form>
          </div>
      </div>
      ';
      }else{
        return '
        <div class="w3-container w3-light-grey" style="padding:128px 16px">
            <div id="main">
                <h1>Login</h1>
                <div id="error">'.$error.'</div>
                <form action="index.php" method="POST" class="w3-form">
                    <label id="usernameLabel">Student Id:</label><br>
                    <input class="w3-input w3-border" id="username" name="user" placeholder="Type your student ID" required>       
                    <br>
                    <br>
                    <input type="submit" class="w3-button w3-red w3-padding-large" id="loginBtn" name="loginBtn" value="LOGIN">
                </form>
                <br>
                <form action="index.php" method="POST">
                    <input type="submit" class="w3-button w3-blue w3-padding-large" id="adminLoginBtn" name="adminLoginBtn" value="Admin Login">
                </form>
                <br>
                <br>
                <form action="index.php" method="POST">
                    <input type="submit" class="w3-padding-large" id="registerBtn" name="registerBtn" value="Register">
                </form>
            </div>
        </div>
        ';
      }
    }
  
    public static function getAbout(){
      global $translations;
        return '<!-- Header with full-height image -->
        <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
          <div class="w3-display-left w3-text-white" style="padding:48px">
            <span class="w3-jumbo w3-hide-small">Blue Jay Pantry</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium">Blue Jay Pantry</span><br>
            <span class="w3-large">'. $translations["About_sub_header"].'</span>
            <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">'.$translations["learn_more_button"].'</a></p>
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
  <h3 class="w3-center">'. $translations["About_header"].'</h3>
  <div class="w3-center w3-col m6">
  <img  src="images/BlueJayPantry-Logo-v4.png" style="width:75%">
  </div>
  <div class="w3-col m6">
  <p class="w3-center w3-large">'. $translations["About_sub_header"].'</p>
<p>'. $translations["About_sub_paragraph"].'</p>

<p>'. $translations["About_sub_paragraph_2"].'</p>
 </div>  
  <h3 class="w3-center">'. $translations["Our_goals_header"].'</h3>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-third">
      <i class="fa-solid fa-utensils w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">'. $translations["Responsive"].'</p>
      <p>'. $translations["Responsive_desc"].'</p>
    </div>
    <div class="w3-third">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">'. $translations["Accessible"].'</p>
      <p>'. $translations["Accessible_desc"].'</p>
    </div>
    <div class="w3-third">
      <i class="fa-solid fa-seedling w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">'. $translations["Healthy_meals"].'</p>
      <p>'. $translations["Healthy_meals_desc"].'</p>
    </div>
    
  </div>
</div>
<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">140+</span>
    <br>'. $translations["about_statistics_students"].'
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">55,432+</span>
    <br>'. $translations["about_statistics_items_distributed"].'
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">89+</span>
    <br>'. $translations["about_statistics_meals_delivered"].'
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">51+</span>
    <br>'. $translations["about_statistics_families_fed"].'
  </div>
</div>

<!-- Promo Section - "Accessible" -->
<div class="w3-container w3-light-white" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>'.$translations["we_are_accessible"].'</h3>
      <p>'.$translations["pantry_hours"].'<BR>
      '.$translations["pantry_open"].'<BR>
	  <BR>
    '.$translations["location"].'<BR>
    '.$translations["BSC251"].'<BR>
	  <BR>
'.$translations["contact_info"].'<BR>
'.$translations["Center_for_civic"].' | civicengagement@etown.edu</p>
      <p><a href="index.php?page=products" class="w3-button w3-red"><i class="fa fa-th"> </i> '.$translations["view_inventory_button"].' </a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="images/food-pantry.jpg" alt="Pantry Shelves Image" width="700" height="394">
    </div>
  </div>
</div>

<!-- Donate Section -->
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="donate">
  <h3>'.$translations["Donation_Header"].'</h3>
  <p class="w3-large">'.$translations["Donation_desc"].'</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">'.$translations["Food_head"].'</li>
        <li class="w3-padding-16">'.$translations["Food_desc1"].'</li>
        <li class="w3-padding-16">'.$translations["Food_desc2"].'</li>
        <li class="w3-padding-16">'.$translations["Food_desc3"].'</li>
        <li class="w3-padding-16">'.$translations["Food_desc4"].'</li>
        <li class="w3-padding-16">'.$translations["Food_desc5"].'</li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">'.$translations["food_find_more"].'</button>
        </li>
      </ul>
    </div>
    <div class="w3-third">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-blue w3-xlarge w3-padding-48">'.$translations["Money_Head"].'</li>
        <li class="w3-padding-16">'.$translations["Money_desc1"].'</li>
         <li class="w3-padding-16">'.$translations["Money_desc2"].'</li>
        <li class="w3-padding-16">'.$translations["Money_desc3"].'</li>
      
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">'.$translations["donate_here"].'</button>
        </li>
      </ul>
    </div>
    <div class="w3-third w3-section">
      <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">'.$translations["Time_head"].'</li>
        <li class="w3-padding-16">'.$translations["Time_desc1"].'</li>
        <li class="w3-padding-16">'.$translations["Time_desc2"].'</li>
        <li class="w3-padding-16">'.$translations["Time_desc3"].'</li>
        <li class="w3-padding-16">'.$translations["Time_desc4"].'</li>
    
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-red w3-padding-large">'.$translations["time_sign_up"].'</button>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Contact Section -->
<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">'.$translations["contact"].'</h3>
  <p class="w3-center w3-large">'.$translations["contact_desc"].'</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i>Elizabethtown College, Brossman Center</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: mail@mail.com</p>
    <br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder='.$translations["name"].' required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder='.$translations["email"].' required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder='.$translations["subject"].' required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder='.$translations["message"].' required name="Message"></p>
      <p>
        <button class="w3-button w3-red" type="submit">
          <i class="fa fa-paper-plane"></i> '.$translations["send_message_button"].'
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
            case 'ByDependentInfo': 
                  $content .= GoogleChartDisplay::getDependentData($data);
                  break;
            case 'ByUserInfo':
                $content .= GoogleChartDisplay::getUserData($data);
                break;
            default:
                $content .= GoogleChartDisplay::getTotalReport($data);

        }
        
        return $content;
        
    }


    public static function getRegisterForm() {
      $error = (isset($_SESSION["error"])) ? $_SESSION["error"] : "";
      
      return '
      <div class="w3-container w3-light-grey" style="padding:128px 16px">
      <div id="main">
          <h1>Register</h1>
          <div id="error">' . $error . '</div>
          <form action="./utils/register.php" method="post" class="w3-form">
              <label id="usernameLabel">Student ID:</label><br>
              <input class="w3-input w3-border" id="username" name="username" placeholder="Type your student ID" required>
              <br>
              
              <label>Is this your first time using the pantry?</label><br>
              <input type="radio" id="firstTimeYes" name="firstTime" value="true" required> 
              <label for="firstTimeYes">Yes</label>
              <input type="radio" id="firstTimeNo" name="firstTime" value="false" required>
              <label for="firstTimeNo">No</label>
              <br>
              
              <label>Is the food you collected being distributed to other people (roommates, family, children, etc)?</label><br>
              <input type="radio" id="foodDistributedYes" name="foodDistributed" value="true" required>
              <label for="foodDistributedYes">Yes</label>
              <input type="radio" id="foodDistributedNo" name="foodDistributed" value="false" required>
              <label for="foodDistributedNo">No</label>
              <br>
              
              <label>If yes to the last question, how many children under 18? If no, input "0"</label><br>
              <input class="w3-input w3-border" type="number" id="childrenUnder18" name="childrenUnder18" placeholder="Type number" min="0" value="" required>
              <br>
              
              <label>If yes, how many adults 18-59? If no, input "0"</label><br>
              <input class="w3-input w3-border" type="number" id="adults18to59" name="adults18to59" placeholder="Type number" min="0" value="" required>
              <br>
              
              <label>If yes, how many seniors over 60? If no, input "0"</label><br>
              <input class="w3-input w3-border" type="number" id="seniorsOver60" name="seniorsOver60" placeholder="Type number" min="0" value="" required>
              <br>
              
              <label>Do you have any suggestions for the Blue Jay Pantry?</label><br>
              <textarea class="w3-input w3-border" id="suggestions" name="suggestions" placeholder="Type your suggestions here" rows="4"></textarea>
              <br>
              
              <input type="submit" class="w3-button w3-red w3-padding-large" value="Register">
          </form>
          <br>
          <form action="index.php" method="POST">
              <input type="submit" class="w3-button w3-blue w3-padding-large" id="backToUserLoginBtn" name="backToUserLoginBtn" value="Back to Login">
          </form>
      </div>
  </div>
  
      ';
  }
  
}
?>