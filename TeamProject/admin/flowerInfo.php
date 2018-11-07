<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("heroku_fb9ee4f9f26217f");
include '../inc/functions.php';
validateSession();

if (isset($_GET['flowerId'])) {

  $flowerInfo = getFlowerInfo($_GET['flowerId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Flower Info </title>
    </head>
    <body>
    <img src='<?="../".$flowerInfo['flower_img']?>' height = 75px />
    <h3><?=$flowerInfo['flowerName']?></h3>
     <?=$flowerInfo['flowerDesc']?>
     
 
    </body>
</html>