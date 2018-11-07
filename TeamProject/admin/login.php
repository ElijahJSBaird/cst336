<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("heroku_fb9ee4f9f26217f");

$username = $_POST['username'];
$password = sha1($_POST['password']);

//This SQL does NOT prevent SQL Injection (because of the single quotes)
// $sql = "SELECT * FROM om_admin
//                  WHERE username = '$username' 
//                  AND  password = '$password'";
                 
$sql = "SELECT * FROM tp_admin
                 WHERE adminUser = :username 
                 AND  adminPassword = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    
    echo "Wrong username or password!!";
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: adminPage.php'); //redirects to another program
    
}


?>