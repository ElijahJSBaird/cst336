<?php

include '../../inc/dbConnection.php';
$conn = startConnection("ottermart");

$productId = $_GET["productId"];

$sql = "SELECT *
        FROM om_product
        NATURAL JOIN om_purchase
        WHERE productId = :pId";
        
$np = array();
$np[":pId"] = $productId;

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

echo $records[0]["productName"]."<hr/>";
echo "<img src='".$records[0]["productImage"]."' width='200'/><br>";

foreach ($records as $record)
{
    echo "Purchase Date: ".$record["purchaseDate"]."<br>
          Unit Price: ".$record["unitPrice"]."<br>
          Quantity: ".$record["quantity"]."<br>
        ";
}

?>