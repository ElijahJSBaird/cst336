<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();


$sql = "DELETE FROM ".$_GET["faction"]." WHERE name = '" . $_GET['name']."'";
echo $sql;
$stmt=$dbConn->prepare($sql);
$stmt->execute();



header("Location: admin.php");



?>