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
<html>
    <head>
        <title> Login Error </title>
        <link rel="stylesheet" href="cssIndex/styles.css" type="text/css" />
        <?php
            if (empty($record)) {
            
            echo "<div id='error'> Wrong username or password!! </div>";
            } else {
           
               $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
               header('Location: admin.php'); //redirects to another program
                
            }
        ?>
    </head>
    
    <body>
        <form method="post" action="index.php">
          <input type="submit" value="Back">
        </form>
    </body>
    <footer>
        <hr id="hr100"/>
        <small>
        CST 336 2018 &copy; Baird <br/>
        
        <strong>Disclaimer:</strong> 
        The information displayed on this page is fictitious for academic purposes only. <br/>
        <br/>
        <img src="../../img/csumb_logo.jpg" alt="CSUMB logo" title="This is
        the CSUMB logo"/>
        <img src="../../img/buddy_verified.png" alt="Buddy Verified" 
        title="This is the buddy verification badge"/>
        </small>
    </footer>
</html>