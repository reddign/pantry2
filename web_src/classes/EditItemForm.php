<?PHP
require_once "GoogleChartDisplay.php";
class EditItemForm{
    public static function getForm($product,$categories){
      $error = (isset($_SESSION["error"]))?$_SESSION["error"]:"";
      $display = '
      <div class="w3-container w3-light-grey" style="padding:128px 16px">
          <div id="main" style="padding:12px 160px">
              <h1>Edit Item</h1>
              <div id="error">'.$error.'</div>';
      $display .= "<form method='post' action='index.php' class='w3-form'  enctype='multipart/form-data'>";
      $display .= "Product ID: {$product->productID}<br>";
      $display .= "<input type='hidden' name='id' id='id' value='{$product->productID}'>";
      $display .= "Product Name: <input type='text' name='name' value='{$product->productName}'><br>";
      $display .= "Quantity: <input type='text' name='qty' value='{$product->quantity}'><br>";
      $display .= "Cat ID: ";
      $display .= "<select name='catID' id='catID'>";
      $display .= "<option value=''>Choose Category</option>";
      foreach($categories as $category){
        $display .= "<option value='".$category->categoryID."'";
        if($category->categoryID == $product->catID){
            $display .= " SELECTED ";
        }
        $display .= ">";
        $display .= $category->categoryType;
        $display .= "</option>";
      }
      $display .= "</select><BR><BR>";
      $display .= "Current Image:<img  src='{$product->img}' alt='productImg' style='width:120px;height:160px;'><br>";
      $display .= "Upload New Image: <input type='file' name='imgfile'><br>";
      $display .= "<BR><BR><input type='submit' class='w3-button w3-red' id='saveBtn' name='saveBtn' value='Save Product Info'>";
      $display .= "</form>";
      $display .= "</div>";
      $display .= "</div>";
      return $display;    
  }
  public static function validateAndProcessData($formdata,$imgdata,$url){
    global $api_key;
    $message = "";
    $image = "";
    $name = $formdata["name"];
    $quantity = intval($formdata["qty"]);
    
    $catID = intval($formdata["catID"]);
    $id = intval($formdata["id"]);
    if($id==0){
        $message = "No Item ID";
    }
    if($catID==0){
        $message = "No Category ID";
    }
    

    if($message==""){

        $imagepath =  EditItemForm::moveImageFile($imgdata,"imgfile");
        $url = $url."/data_src/api/products/update.php";
        $data = array("APIKEY" => $api_key,"productName" => $name,"quantity"=>$quantity,"img"=>$imagepath,"catID"=>$catID,"productID"=>$id);
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
        $message = $response;
    }else{
        $responseData = ["message"=>$message];
        $message = json_encode($http_response_header);
    }
    return $message;
  }
  private static function moveImageFile($imgdata,$fieldName){
    $imagePath = "";
    if($imgdata[$fieldName]["tmp_name"]!="" && file_exists($imgdata[$fieldName]["tmp_name"])){
        $path = $_FILES[$fieldName]['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $imageName = date("Y_m_d_h_i_").rand(1,100).".".$ext;
        $imagePath = "images/products/".$imageName;
        if(is_file($imagePath)){
            $imageName = date("Y_m_d_h_i_").rand(1,100).".".$ext;
            $imagePath = "images/products/".$imageName;
        }
        move_uploaded_file($imgdata[$fieldName]["tmp_name"],$imagePath);
    }

    return $imagePath;
  }
}
?>