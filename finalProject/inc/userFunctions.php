<?php

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}

function cmp($a, $b)
{
    if ($a["name"] == $b["name"]) {
        return 0;
    }
    return ($a["name"] < $b["name"]) ? -1 : 1;
}

function displayAllHeartless(){
    global $dbConn;
    $name = $_GET["name"];
    $color = $_GET["color"];
    $order = $_GET["order"];
    if ($order == "asc") {
        $sql = "SELECT * FROM heartless WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = ".$name;
        }
        $sql .= " ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records1 = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
        $sql = "SELECT * FROM nobody WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = ".$name;
        }
        $sql .= " ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sql = "SELECT * FROM unversed WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = ".$name;
        }
        $sql .= " ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $records = array_merge($records1, $records2); 
        $records = array_merge($records, $records3);
    } 
    else {
        $sql = "SELECT * FROM heartless WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = '".$name."'";
        }
        $sql .= " ORDER BY name DESC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records1 = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
        $sql = "SELECT * FROM nobody WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = '".$name."'";
        }
        $sql .= " ORDER BY name DESC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sql = "SELECT * FROM unversed WHERE 1";
        if ($color) {
            $sql .= " AND color = '".$color."'";
        }
        if ($name) {
            $sql .= " AND name = '".$name."'";
        }
        $sql .= " ORDER BY name DESC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $records = array_merge($records1, $records2); 
        $records = array_merge($records, $records3);
    } 
    
    
    foreach ($records as $record) {
        
        echo "[<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?name=".$record["name"]."&faction=".$record['enemy']."'>".$record['name']."</a>]  ";
        echo "<br><strong>Description:</strong> ".$record["description"]."<br><strong>Size:</strong> ".$record["size"]."<br><strong>Color:</strong> ".$record["color"]."<br><br>";
        
    }
}

function displayResults() {
        //global $items;
        global $dbConn;
        
        echo "<table class='table'>";
        foreach($_SESSION['display'] as $t) {
            $name = $t['name'];
            $description = $t['description'];
            $size = $t['size'];
            $color = $t['color'];
                
            //Display item as tablerow.
            echo '<tr>';
            //echo "<td><img src='$flower_img' class= 'images'></td>";
            // echo "<td><img src='$flower_img'  style = 'width: 250px; height: 200px;'></td>";
            echo "<td>";
            echo "<h4>$name</h4>";
            
            echo "<a class='btn btn-primary' role='button' href='updateProduct.php?enemy=".$record['enemy']."&name=".$record['name']."&faction=".$record['enemy']."&description=".$record["description"]."&color=".$record["color"]."&size=".$record["size"]."'>Update</a>";
            echo "</td>";
            echo "<td><h4>$description</h4><br/>";
            echo "</td>";
                
            //A hidden input element containing the item name.
            echo "<form>";
            echo "<input type='hidden' name='name' value='$name'>";
            echo "<input type='hidden' name='description' value='$description'>";
            // echo "<input type='hidden' name='flower_img' value='$flower_img'>";
            echo "<input type='hidden' name='size' value='$size'>";
            //** BUTTONS CAN HAVE NAMES ** 
            //** THE CONDITION IN THE FILTER PRODUCTS FUNCTION was expecting 'searchForm'.  The hidden inputs 
            //** did not submit that value, the condition did not pass any data into $items.
            // Problem:  the hidden values are being passed into the filter function.  
            // Save the primary form items in their own array, and display uses that.  
             //echo "$ GET FLOWER NAME IS " . $_GET['name'];
        
            
            echo "<td><button name='searchForm' value='Add' class='btn btn-warning'>Add</button></td>";
    
            echo "</form>";
            echo "</tr>";
        }
    echo "</table>";

} 

function displayColors() {
    global $dbConn;
    $sql = "SELECT color FROM heartless
            UNION
            SELECT color FROM nobody
            UNION
            SELECT color FROM unversed";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
    foreach($record as $rec) {
        echo "<option>" . $rec['color'] . "</option><br/>";
        echo "<script>console.log('".$rec['name']."');</script>";
    }
}

function filterEnemies() {
    global $dbConn;
    global $temp;
        if (!empty($_GET['searchForm'])) {
        
            $name = $_GET['name'];
            $color = $_GET['color'];
            $size = $_GET['size'];
            $description = $_GET['description'];
            
            
            $np = array();
            $sql = "SELECT * FROM heartless   
                             NATURAL JOIN nobody 
                             NATURAL JOIN unversed
                             WHERE 1";
            
            if(!empty($_GET['name'])) {
                $sql .= " AND (name LIKE :name OR description LIKE :name)";
                $np[':name'] = "%$name%";
            }
            if(!empty($_GET['color'])) {
                $sql .= " AND color = :color";
                $np[':color'] = $color;
            }
            if(!empty($_GET['size'])) {
                $sql .= " AND size = :size";
                $np[':size'] = $size;
            }
            if(!empty($_GET['description'])) {
                $sql .= " AND description = :description";
                $np[':description'] = $description;
            }
            if(isset($_GET['order'])) {
                if($_GET['order'] == "asc") {
                    $sql .= " ORDER BY name ASC";
                } else if ($_GET['order'] == "desc") {
                    $sql .= " ORDER BY name DESC";
                } else if ($_GET['order'] == "ascSize") {
                    $sql .= " ORDER BY size DESC";
                } else if ($_GET['order'] == "descSize"){
                    $sql .= " ORDER BY size ASC";
                }
            }
            
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $temp = $record;
        return $temp;
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