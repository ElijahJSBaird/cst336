<?php

$backgroundImage = "img/sea.jpg";

// print_r ($_GET);//$_GET is special and will automatically get what is submitted in the form with the GET method
//also $_POST for the POST method in a form

if (isset($_GET["keyword"]))
{
    $keyword = $_GET["keyword"];
    include "api/pixabayAPI.php";
    echo "You searched for: $keyword";
    
    echo "Layout: ".$_GET["layout"];

    $imageURLs = getImageURLs($keyword, $_GET["layout"]);
    
    $backgroundImage = $imageURLs[array_rand($imageURLs)];

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Image Slideshow </title>
        
        <style>
            body
            {
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <form method="GET"><!--Not having a method will default to method="GET"  POST is like GET but doesnt show anything new in url, good for sensitive information like passwords-->
            <input type="text" name="keyword" size="15" placeholder="Keyword"/>
            
            <input type="radio" name="layout" value="horizontal"> Horizontal
            <input type="radio" name="layout" value="vertical"> Vertical
            
            <input type="submit" name="submitButton" value="Submit!!"/>
            
            <h1>You must type a keyword or select a catagory</h1>
        </form>
    </body>
</html>