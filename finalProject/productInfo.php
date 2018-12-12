<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();

if (isset($_GET['name'])) {

  $productInfo = getProductInfo($_GET['name'], $_GET['faction']);    
//   print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$productInfo['name']?></h3>
     <?=$productInfo['description']?><br>
     <!--<img src='<?=$productInfo['productImage']?>' height='75'/>-->
 
    </body>
</html>