<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $name = $_GET['name'];
    $description =  $_GET['description'];
    $size =  $_GET['size'];
    $type =  $_GET['faction'];
    $color = $_GET['color'];
    $faction = $_GET['faction'];
    
    
    $sql = "INSERT INTO ".$type." (name, description, size, color, faction) 
            VALUES (:name, :description, :size, :color, :faction);";
    $np = array();
    $np[":name"] = $name;
    $np[":description"] = $description;
    $np[":size"] = $size;
    $np[":color"] = $color;
    $np[":faction"] = $faction;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Enemy was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
        <link rel="stylesheet" href="cssIndex/styles.css" type="text/css" />
    </head>
    <body id="admin">
        
        <h1> Adding New Enemy </h1>
        
        <form>
           Enemy Name: <input type="text" name="name"><br>
           Description: <textarea name="description" cols="50" rows="4"></textarea><br>
           Color: <input type="text" name="color"><br>
           Size: <input type="text" name="size"><br>
           Enemy Faction: 
           <select name="faction">
              <option value="">Select One</option>
              <option value="heartless">Heartless</option>
              <option value="nobody">Nobody</option>
              <option value="unversed">Unversed</option>
           </select> <br />
           <!--Set Image Url: <input type="text" name="productImage"><br>-->
           <input type="submit" name="addProduct" value="Add Enemy">
        </form>
            <form method="post" action="admin.php">
                <input type="submit" value="Back">
            </form>
    </body>
    <?php include "inc/footer.php"; ?>
</html>