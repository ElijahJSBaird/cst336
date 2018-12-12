<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
include 'inc/functions.php';
$name =  $_GET['name'];
$faction =  $_GET['faction'];
$description = $_GET['description'];
$color = $_GET['color'];
$id =  $_GET['id'];
$size = $_GET['size'];
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    global $name, $faction, $description, $color, $id, $size;
    
    
    $sql = "UPDATE ".$faction." 
            SET description = :description,
               color = :color,
               size = :size
            WHERE name = '".$name."'";
    // echo $sql."<br>";
         
    $np = array();
    // $np[":name"] = $productName;
    $np[":description"] = $description;
    $np[":color"] = $color;
    $np[":size"] = $size;
    // $np[":productImage"] = $image;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "Enemy was changed!";
}


if (isset($_GET['name'])) {

  $productInfo = getProductInfo($name, $faction);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Enemy </title>
        <link rel="stylesheet" href="cssIndex/styles.css" type="text/css" />
    </head>
    <body id="admin">

        <h1> Updating <?php echo $name ?> </h1>
        
        <form>
           <input type="hidden" name="name" value=<?php echo $name ?>>
           <input type="hidden" name="faction" value=<?php echo $faction ?>>
           <h2><?php echo ucfirst($faction) ?></h2><br>
           Description: <textarea name="description" cols="50" rows="4" ><?=$description?></textarea><br>
           Color: <input type="text" name="color" value="<?=$color?>"><br>
           Size: <input type="text" name="size" value="<?=$size?>"><br>
           <input type="submit" name="updateProduct" value="Update Enemy">
        </form>
        <form method="post" action="admin.php">
            <input type="submit" value="Back">
        </form>
        
    </body>
    <?php include "inc/footer.php"; ?>
</html>