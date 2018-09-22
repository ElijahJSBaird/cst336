<?php
    session_start(); //starts or resumes an existing session
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Setting a Session Variable </title>
    </head>
    
    <body>
        <h1> My name is <?= $SESSION["my_name"] ?> </h1>
    </body>
</html>