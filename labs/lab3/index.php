<!DOCTYPE html>
<?php
    include "inc/functions.php"; 
    include "timeElapsed.php";
?>

<html>
    <head>
        <title>Super Silver Jack!! Kingdom Hearts Style!</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        <h1>Super Silver Jack!! Kingdom Hearts Style!! <hr></h1>
        
        <FORM id="layoutDiv2">
            <a href="#" class="refresh" onClick="history.go(0)">Play Again</a>
        </FORM>
        <!--<br><br>-->
        <div id="layoutDiv2" class="hand">
        <?php
            $start = microtime(true);
        
            buildDeck();
            shuffle($deck);
            shuffle($players);
            for ($i = 0; $i < 4; $i++) {
                dealCards($i);
            }
        ?>
            </div>
            <br></br>
        <div id="layoutDiv2" class = "winners">
        <?php
            winnerCalc();
            //echo"totals:";
            //print_r($totals);
            //echo "<br/>";
            //print_r($diff);
            echo "<br/>";
            displayElapsedTime();
        ?>
        </div>
        
        <footer>
            <div id="layoutDiv">
                <br></br>
                <br></br>
                <br></br>
                CST 336 2018 &copy; Baird, Chi, Hernandez and Anacleto<br/>
                <strong>Disclaimer:</strong> We did not create any of the characters 
                on this site. 
                <br/>All images belong to the Kingdom Hearts franchise and 
                all rights belong to <br/>Disney and Square Enix.
            </div>
            <br></br>
            <br></br>
                <img src="img/csumblogo.png" alt="CSUMB logo" title="This is the CSUMB logo"/>
        </footer>
    </body>
</html>