<?php
    include "inc/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <div id="main">
            <style>
                @import url("css/styles.css");
            </style>
            <?php
                play();
            ?>
        
        <form>
            <input type="submit" value="Spin!"/>
        </form>
        </div>

    </body>
    <footer style="clear: left;">
            <small>
            <hr witdth = "100%"/>
            <p style="color:MediumSeaGreen;">
            CST 336 2018 &copy; Baird <br/>
            
            <strong>Disclaimer:</strong> The information displayed on this page is fake. 
            <br/>It's used for academic purposes only.
            <br/>
            </p>
            <img src="../../img/csumb_logo.jpg" alt="CSUMB logo" title="This is the CSUMB logo"/>
            <!--<img src="../../img/buddy_verified.png" alt="Buddy Verified" title="This is the buddy verification badge"/>-->
            </small>
        </footer>
</html>