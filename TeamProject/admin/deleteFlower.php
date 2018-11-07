<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("heroku_fb9ee4f9f26217f");
include '../inc/functions.php';
validateSession();

$sql = "DELETE FROM `tp_flowers` WHERE flower_Id = '" . $_GET['flowerId']."'";
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: adminPage.php");



?>