<?php

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}


function displayAllHeartless(){
    global $dbConn;
    
    $sql = "SELECT * FROM heartless ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    $enemy = "heartless";
    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?enemy=".$enemy."&name=".$record['name']."&faction=".$enemy."&description=".$record["description"]."&color=".$record["color"]."&size=".$record["size"]."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php?name=".$record["name"]."&faction=".$enemy."' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='name' value='".$record['name']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?name=".$record["name"]."&faction=".$enemy."'>".$record['name']."</a>]  ";
        echo "<br><strong>Description:</strong> ".$record["description"]."<br><strong>Size:</strong> ".$record["size"]."<br><strong>Color:</strong> ".$record["color"]."<br><br>";
        
    }
}
function displayAllNobodies(){
    global $dbConn;
    
    $sql = "SELECT * FROM nobody ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    $enemy = "nobody";
    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?enemy=".$enemy."&name=".$record['name']."&faction=".$enemy."&description=".$record["description"]."&color=".$record["color"]."&size=".$record["size"]."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php?name=".$record["name"]."&faction=".$enemy."' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='id' value='".$record['id']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?name=".$record["name"]."&faction=".$enemy."'>".$record['name']."</a>]  ";
        echo "<br><strong>Description:</strong> ".$record["description"]."<br><strong>Size:</strong> ".$record["size"]."<br><strong>Color:</strong> ".$record["color"]."<br><br>";
        
    }
}
function displayAllUnversed(){
    global $dbConn;
    
    $sql = "SELECT * FROM unversed ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    $enemy = "unversed";
    foreach ($records as $record) {
        
        echo "<a class='btn btn-primary' role='button' href='updateProduct.php?enemy=".$enemy."&name=".$record['name']."&faction=".$enemy."&description=".$record["description"]."&color=".$record["color"]."&size=".$record["size"]."'>Update</a>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<form action='deleteProduct.php?faction=".$enemy."&name=".$record["name"]."' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='id' value='".$record['id']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?name=".$record["name"]."&faction=".$enemy."'>".$record['name']."</a>]  ";
        echo "<br><strong>Description:</strong> ".$record["description"]."<br><strong>Size:</strong> ".$record["size"]."<br><strong>Color:</strong> ".$record["color"]."<br><br>";
        
    }
}

// function getCategories() {
//     global $dbConn;
    
//     $sql = "SELECT * FROM om_category ORDER BY catName";
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute();
//     $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
//     //print_r($records);
    
//     return $records;
    
// }

function getProductInfo($name, $enemy) {
    global $dbConn;
    
    $sql = "SELECT * FROM ".$enemy." WHERE name = '".$name."'";
    // echo $sql."<br>";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

?>