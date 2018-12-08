<?php

include '../../../../inc/dbConnection.php';
$dbConn = startConnection("c9");

$sql ="SELECT * FROM pets WHERE id = ".$_GET['petId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

echo json_encode($record);

?>