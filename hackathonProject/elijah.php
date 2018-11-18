<?php

include('functions.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> MapIt </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        body {
            background-image: url("img/back.jpg"); /* new tag */
            background-size: 100%;
            background-repeat: no-repeat;
            color: white;
         } 
    </style>

    <body>
        <div id="title"> </div>
        <br>
        <form method="POST">
            <div id="div_table">
                <center><table cellspacing="40" id="tb2">
                <tbody>
                <tr>
                <td>        
                    <label>
                      <input type="radio" name="test" value="earthquake" required>
                      <img width="70" src="img/icons/earthquake.png"><p>Earthquake</p>
                    </label>
                </td>
                
                <td>
                    <label>
                      <input type="radio" name="test" value="fire" required>
                      <img width="70" src="img/icons/fire.png"><p>Fire</p>
                    </label>
                </td>
                <td>
                    <label>
                      <input type="radio" name="test" value="avalanches" required>
                      <img width="70" src="img/icons/avalanches.png"><p>Avalanche</p>
                    </label>
                </td>
                </tr>
                
                
                <tr>
                <td>
                    <label>
                      <input type="radio" name="test" value="blizzar" required>
                      <img width="70" src="img/icons/blizzar.png"><p>Blizzard</p>
                    </label>
                </td>
                
                <td>
                    <label>
                      <input type="radio" name="test" value="hole" required>
                      <img width="70" src="img/icons/hole.png"><p>Sink Hole</p>
                    </label>
                </td>
                
                <td>
                    <label>
                      <input type="radio" name="test" value="landslide" required>
                      <img width="70" src="img/icons/landslide.png"><p>Landslide</p>
                    </label>
                </td>
                </tr>
                
                
                <tr>
                <td>
                    <label>
                      <input type="radio" name="test" value="thunderstorm" required>
                      <img width="70" src="img/icons/thunderstorm.png"><p>Thunderstorm</p>
                    </label>
                </td>
                
                <td>
                    <label>
                      <input type="radio" name="test" value="tornado" required>
                      <img width="70" src="img/icons/tornado.png"><p>Tornado</p>
                    </label>
                </td>
                
                <td>
                    <label>
                      <input type="radio" name="test" value="tsunami" required>
                      <img width="70" src="img/icons/tsunami.png"><p>Tsunami</p>
                    </label>
                </td>
                </tr>
                </tbody>
            </table></center>
            </div>
            
            <center><h2 id="h2_1">Choose the location nearest to you:</h2></center>
            <select id="location" name='location' required>
                <option value="" disabled selected>-Select your location-</option>
                <option value="csumb">CSUMB</option>
                <option value="sandCity">Sand City</option>
                <option value="monterey">Monterey</option>
                <option value="salinas">Salinas</option>
                <option value="carmel">Carmel</option>
                <option value="marina">Marina</option>
                <option value="seaside">Seaside</option>
            </select>
            <br><br>
            <input type="submit" value="report" name="report">
        </form>
        
        
        <form action="index.php">
            <input type="submit" value="back" name="back">
        </form>
        
        <?php
            if($_POST['report'] == "report") {
                summitForm();
            }
            
        ?>
        

        
    </body>
</html>