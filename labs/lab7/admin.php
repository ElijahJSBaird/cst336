<?php
session_start();



include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

include 'inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Really??");
                
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            
        </script>
    
    </head>
    <div id="hey">
            <h1> ADMIN SECTION - OTTERMART </h1>
            
             <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>
    
              <form action="addProduct.php">
                  <input type="submit" value="Add New Product">
              </form>
             <form action="logout.php">
                  <input type="submit" value="Logout">
              </form>
    
               <br><br>
        </div>
    <body id="admin">
        
        <?= displayAllProducts() ?>
        
        
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="openModal();">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
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