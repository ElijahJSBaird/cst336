<?php

$page = $_GET["assignment"];

if (isset($_GET["assignment"])) {
    if ($page == "hw1" || $page == "hw2" || $page == "hw3")
        header("Location:hw/".$page);
    else if ($page == "tp")
        header("Location:TeamProject");
    else {
        if ($page == "lab5")
            header("Location:labs/".$page."/scart");
        else
            header("Location:labs/".$page);
    }
}

?>

<!DOCTYPE html>
<html>
 
 <head>
    <title>Elijah's Web Portfolio</title>
 </head>   
 <body>
 <?php
 // A simple web site in Cloud9 that runs through Apache
 // Press the 'Run' button on the top to start the web server,
 // then click the URL that is emitted to the Output tab of the console
 echo " <h1> Elijah Baird's CST336 site </h1>";
 
 ?>
    <style type="text/css">
        body {
            text-align: center;
        }
    </style>
    
    <form>
        <select name="assignment">
            <option value="hw1">Homework 1</option>
            <option value="hw2">Homework 2</option>
            <option value="hw3">Homework 3</option>
            <option value="lab1">Lab 1</option>
            <option value="lab2">Lab 2</option>
            <option value="lab3">Lab 3</option>
            <option value="lab4">Lab 4</option>
            <option value="lab5">Lab 5</option>
            <option value="lab6">Lab 6</option>
            <option value="lab7">Lab 7</option>
            <!--<option value="lab8">Lab 8</option>-->
            <option value="tp">Team Project</option>
        </select>
        
        <input type="submit" name="submit" value="Search!"/>
    </form>
 </body>
 </html>