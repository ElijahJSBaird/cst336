<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['productName'];
    $description = $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "UPDATE om_product 
            SET productName= :productName,
               productDescription = :productDescription,
               price = :price,
               catId = :catId,
               productImage = :productImage
            WHERE productId = " . $_GET['productId'];
         
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    $np[":productImage"] = $image;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "Product was changed!";
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body id="admin">

        <h1> Updating a Product </h1>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
           Product name: <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        <form method="post" action="admin.php">
            <input type="submit" value="Back">
        </form>
        
    </body>
    <footer>
        <hr id="hr100"/>
        <small>
        CST 336 2018 &copy; Baird <br/>
        
        <strong>Disclaimer:</strong> 
        The information displayed on this page is fictitious for academic purposes only. <br/>
        <br/>
        <img src="../../img/csumb_logo.jpg" alt="CSUMB logo" title="This is
        the CSUMB logo"/>
        <img src="../../img/buddy_verified.png" alt="Buddy Verified" 
        title="This is the buddy verification badge"/>
        </small>
    </footer>
</html>