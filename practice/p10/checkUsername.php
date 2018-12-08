<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$sql = "SELECT * 
        FROM om_admin 
        WHERE username = :username
        AND password = :password";
        
$np = array();
$np[":username"] = $_GET["username"];
$np[":password"] = $_GET["password"];
        
$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($record);
echo ($record);

?>