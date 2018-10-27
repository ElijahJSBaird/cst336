<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM om_admin
                 WHERE username = '$username' 
                 AND  password = '$password'";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    
    echo "Wrong username or password!!";
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php'); //redirects to another program
    
}


?>