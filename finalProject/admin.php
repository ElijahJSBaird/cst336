<?php
session_start();



include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");

include 'inc/functions.php';
// include 'deleteProduct.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="cssIndex/styles.css" type="text/css" />
        
        <script> 
            function confirmDelete() {
                // deleteEnemy();
                return confirm("Really??");
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            
        </script>
    
    </head>
    <div id="hey">
            <h1> ADMIN SECTION - KINGDOM HEARTS ENEMIES </h1>
            
             <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>
    
              <form action="addProduct.php">
                  <input type="submit" value="Add New Enemy">
              </form>
             <form action="logout.php">
                  <input type="submit" value="Logout">
              </form>
    
               <br><br>
        </div>
    <body id="admin">
        
        <?php
            displayAllHeartless(); 
            displayAllNobodies();
            displayAllUnversed();
        ?>
        
        
<!-- Button trigger modal -->
<br>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enemy Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productModal" width="450" height="250"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>        
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
    <?php include "inc/footer.php"; ?>
</html>