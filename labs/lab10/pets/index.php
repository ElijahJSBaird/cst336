<?php
include '../../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function getPetNames(){
    global $dbConn;
    
    $sql = "SELECT name FROM pets ORDER BY name ASC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $records;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> CSUMB: Pet Shelter </title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
		<style>
		body {
			text-align: center;
		}
		</style>
		
	</head>
	<body>
		<?php include "inc/header.php" ?>
		<!-- Display Carousel here -->
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 400px; margin: 0 auto">
		  <div class="carousel-inner">
			<?php
				$pets = getPetNames();
				$i = 0;
				foreach($pets as $pet) {
					if ($i == 0) {
						echo '<div class="carousel-item active">
						        <img class="d-block w-100" src="img/'.lcfirst($pet['name']).'.jpg" alt="'.$pet['name'].'">
						      </div>';
					}
					else {
						echo '<div class="carousel-item">
						        <img class="d-block w-100" src="img/'.lcfirst($pet['name']).'.jpg" alt="'.$pet['name'].'">
						      </div>';
					}
					$i += 1;
				}
			?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		<br>
		<a class="btn btn-primary" href="pets.php" role="button">Adopt Now</a>
	
	
		<?php include "inc/footer.php" ?>
	</body>
</html>