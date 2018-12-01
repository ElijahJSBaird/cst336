<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$sql = "SELECT * 
        FROM om_admin 
        WHERE username = :username";
        
$np = array();
$np[":username"] = $_GET["username"];
        
$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($record);
echo json_encode($record);

?>