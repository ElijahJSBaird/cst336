<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();

function deleteEnemy() {
    $sql = "DELETE FROM ".$_GET["faction"]." WHERE name = '" . $_GET['name']."'";
    echo "<script>console.log('".$sql."');</script>";
    $stmt=$dbConn->prepare($sql);
    $stmt->execute();
}



header("Location: admin.php");



?>