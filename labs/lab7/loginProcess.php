<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

//This SQL does NOT prevent SQL Injection (because of the single quotes)
// $sql = "SELECT * FROM om_admin
//                  WHERE username = '$username' 
//                  AND  password = '$password'";
                 
$sql = "SELECT * FROM om_admin
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

// print_r($record);

// if (empty($record)) {
    
//     echo "Wrong username or password!!";
// } else {
   
//   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
//   header('Location: admin.php'); //redirects to another program
    
// }


?>
<!DOCTYPE html>
<html id="error">
    <head>
        <title> Login Error </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
    </head>
    <?php
            if (empty($record)) {
            
            echo "Wrong username or password!!";
            } else {
           
               $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
               header('Location: admin.php'); //redirects to another program
                
            }
        ?>
    <body id="error">
        
        <form method="post" action="index.php">
          <input type="submit" value="Back">
        </form>
    </body>
</html>