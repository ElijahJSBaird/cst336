<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");


//This SQL does NOT prevent SQL Injection (because of the single quotes)
// $sql = "SELECT * FROM om_admin
//                  WHERE username = '$username' 
//                  AND  password = '$password'";
function login($username, $password) {
    global $dbConn;
    // $username = $_POST['username'];
    // $password = sha1($_POST['password']);
    
    $sql = "SELECT * FROM admin
                     WHERE username = :username 
                     AND  password = :password ";                 
    $np = array();
    $np[':username'] = $username;
    $np[':password'] = $password;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    
    // print_r($record);
    
    if (empty($record)) {
        $_SESSION['adminFullName'] = "Guest";
        header('Location: user.php');
    } else {
        $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
       if ($record["isAdmin"] == 1){
          header('Location: admin.php'); //redirects to another program
       } else {
          header('Location: user.php');
       }
    }
}

?> 

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel="stylesheet" href="cssIndex/styles.css" type="text/css" />
        
    </head>
    <body>

        <h1> Kingdom Hearts Enemies - Admin Login </h1>
        
        <form method="post">
          Username:  <input type="text" name="username"/> <br>
          Password:  <input type="password" name="password"/> <br>
          <input type="submit" value="Login">
          <br>
          <?php
          if (isset($_POST["username"])) {
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            // echo $username."<br>".$password;
            // if (isset($_POST["Login"])) {
                login($username, $password);
            // }
          }
          ?>
        </form>

    </body>
    <?php include "inc/footer.php"; ?>
</html>