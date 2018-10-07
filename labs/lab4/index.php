<?php
    $backgroundImage = "img/sea.jpg";

    if (isset($_GET["keyword"])) 
    {  
        include "api/pixabayAPI.php";
        $keyword = $_GET["keyword"];
        if (!empty($_GET['category'])) 
        { 
            $keyword = $_GET['category'];
        }
    
       $imageURLs = getImageURLs($keyword, $_GET["layout"]);
    
       $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }

function formIsValid() 
{
    if (empty($_GET['keyword']) && empty($_GET['category'])) 
    {
        echo "<h1> ERROR!!! You must type a keyword or select a category</h1>";
        return false;
    }
    return true;
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            
            body 
            {
                border-radius: 12px;
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
            }
            
            #carouselExampleIndicators
            {
                 width:500px;
                 margin:0 auto; 
            }
        </style>
    </head>
    <body>
        <br>
        <form method="GET">
            <input id="layoutDiv" type="text" name="keyword" size="15" placeholder="Keyword" value="<?=$_GET['keyword']?>" />
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="layout_h">
                <label for="layout_h"> Horizontal </label><br>
                 <input type="radio" name="layout" value="vertical" id="layout_v">
                 <label for="layout_v"> Vertical </label><br>
            </div>
            <br>
            <select name="category">
                <option value=""> Select One </option>
                <option value="ocean">Sea</option>
                <option>Mountains</option>
                <option>Forest</option>
                <option  <?= ($_GET['category'] == "Sky")?" selected":"" ?> >Sky</option>
            </select>
            <br><br>
            
            <input id="layoutDiv" type="submit" name="submitBtn" value="Submit!!" />
            
        </form>
        <br>
        <?php 
        if (isset($imageURLs) &&  formIsValid() ) 
        { ?>
        
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                  for ($i=1; $i < 7; $i++) 
                  { 
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                  }
                 ?>
              </ol>
              <div class="carousel-inner">
                <?php
                  for ($i = 0; $i < 7; $i++) 
                  {
                      do {
                       $randomIndex = array_rand($imageURLs);  // rand(0, count($imageURLs)-1);
                      }
                      while (!isset($imageURLs[$randomIndex]));
                      echo "<div class=\"carousel-item ";
                      echo ($i == 0)?" active ":"";
                      echo "\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$randomIndex]."\" alt=\"Second slide\">";
                      echo "</div>";
                      unset($imageURLs[$randomIndex]);
                  }
                 ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        
        <?php
         }
         else 
         {
            echo "<br><h1>Enter a Keyword or Select a Category!</h1>";     
         }
        ?>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
       <footer id = layoutDiv>
            <hr id="hr100"/>
            <small>
            CST 336 2018 &copy; Baird <br/>
            
            <strong>Disclaimer:</strong> I did not create any of the pictures on this site. All images are taken from pixabay.com and all rights belong to them.
            <br/><br/>
            The information displayed on this page for academic purposes only. <br/>
            <br/>
            <img src="../../img/csumb_logo.jpg" alt="CSUMB logo" title="This is
            the CSUMB logo"/>
            <img src="../../img/buddy_verified.png" alt="Buddy Verified" 
            title="This is the buddy verification badge"/>
            </small>
        </footer>
       
    </body>
</html>