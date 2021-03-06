<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO om_product (productName, productDescription, productImage,price, catId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body id="admin">
        
        <h1> Adding New Product </h1>
        
        <form>
           Product name: <input type="text" name="productName"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Price: <input type="text" name="price"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage"><br>
           <input type="submit" name="addProduct" value="Add Product">
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