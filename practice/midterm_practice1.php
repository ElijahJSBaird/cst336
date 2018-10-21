<?php

$nov = array();
$dec = array();
$jan = array();
$feb = array();

for ($i = 1; $i <= 31; $i++)
{
    $dec[] = $i;
    $jan[] = $i;
    if($i < 31)
    {
        $nov[] = $i;
    }
    if($i < 29)
    {
        $feb[] = $i;
    }
    if ($i > 28)
    {
        $feb[] = " ";
    }
    if ($i > 30)
    {
        $nov[] = " ";
    }
}

function generateTable()
{
    $input = $_GET["month"];
    switch($_GET["locations"])
    {
        case "":
            $places = 0;
        case "three":
            $places = 3;
        case "four":
            $places = 4;
        case "five":
            $places = 5;
    }
    $places = $_GET["locations"];
    $country = $_GET["country"];
    global $jan, $feb, $nov, $dec;
    $month = "";
    if ($input == "january")
    {
        $month = $jan;
    }
    if ($input == "february")
    {
        $month = $feb;
    }
    if ($input == "november")
    {
        $month = $nov;
    }
    if ($input == "december")
    {
        $month = $dec;
    }
    
    
    
    if (($input != "") && (isset($_GET["locations"])))
    {
        echo "<hr>".ucfirst($input)." Itinerary<br>
        Visiting ".$places." places in ".$country."
        <br><table align='center'>";
        for ($i = 0; $i < 5; $i++)
        {
            echo "<tr>";
            if ($input == "february" && $i == 4)
            {
                break;
            }
            for ($j = $i * 7; $j < ($i * 7) + 7; $j++)
            {
                echo "<td>".$month[$j]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    if ($month == "" || !isset($_GET["month"]))
    {
        echo "<div id='error'> You must select a Month!</div><br>";
    }
    if ($places > 0 || !isset($_GET["locations"]))
    {
        echo "<div id='error'> You must specify the number of locations!</div><br>";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Winter Vacation Planner </title>
        <link href="midterm_practice_css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="title">
            <h1>Winter Vacation Planner !</h1>
        </div>
        <br>
        <form method="GET">
            Select Month:
            <select name="month">
                <option value=""> Select </option>
                <option value="november">November</option>
                <option value="december">December</option>
                <option value="january">January</option>
                <option value="february">February</option>
            </select>
            <a href="#" data-toggle="tooltip" title="There are 4 months listed, from November to February. No month selected by default.">
                <!--<img src="info.png" width="15" alt="info">-->info
            </a>
            <br><br>
            
            <div id="layoutDiv">
                Number of Locations: 
                <input type="radio" name="locations" value="three" id="layout_three">
                <label for="layout_three"> Three </label>
                <input type="radio" name="locations" value="four" id="layout_four">
                <label for="layout_four"> Four </label>
                <input type="radio" name="locations" value="five" id="layout_five">
                <label for="layout_five"> Five </label>
                <a href="#" data-toggle="tooltip" title="No number selected by default.">
                    <!--<img src="info.png" width="15" alt="info">-->info
                </a>
            </div>
            
            <br>
            Select Country:
            <select name="country">
                <option value="usa">USA</option>
                <option value="mexico">Mexico</option>
                <option value="france">France</option>
            </select>
            <a href="#" data-toggle="tooltip" title="USA is selected by default.">
                <!--<img src="info.png" width="15" alt="info">-->info
            </a>
            <br><br>
            
            <div id="layoutDiv">
                Visit locations in alphabetical order: 
                <input type="radio" name="order" value="atoz" id="a_z">
                <label for="a_z"> A-Z </label>
                <input type="radio" name="order" value="ztoa" id="z_a">
                <label for="z_a"> Z-A </label>
                <a href="#" data-toggle="tooltip" title="Users can leave it blank. If checked, the random locations should be ordered alphabetically">
                    <!--<img src="info.png" width="15" alt="info">-->info
                </a>
            </div>
            <br>
            
            <input type="submit" value="Create Itinerary">
            <a href="#" data-toggle="tooltip" title="Errors displayed if no month and number of locations submitted.">
                <!--<img src="info.png" width="15" alt="info">-->info
            </a>
        </form>
        
        <?php
        if(isset($_GET["month"]))
        {
            generateTable();
        }
        ?>
        
        <br>
          
        <table border="1" width="600">
        <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
        <tr style="background-color:#FFC0C0">
          <td>1</td>
          <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
          <td width="20" align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
          <td>2</td>
          <td>Errors are displayed if month or number of locations are not submitted.</td>
          <td width="20" align="center">5</td>
        </tr> 
        <tr style="background-color:#FFC0C0">
          <td>3</td>
          <td>Header and Subheader are displayed with info submitted. </td>
          <td align="center">5</td>
        </tr>    
    	<tr style="background-color:#FFC0C0">
          <td>4</td>
          <td>A table with days and weeks is displayed when submitting the form</td>
          <td align="center">5</td>
        </tr> 
        <tr style="background-color:#FFC0C0">
          <td>5</td>
          <td>The number of days in the table correspond to the month selected</td>
          <td align="center">10</td>
        </tr>
        <tr style="background-color:#FFC0C0">
          <td>6</td>
          <td>Random images are displayed in random days</td>
          <td align="center">5</td>
        </tr>       
        <tr style="background-color:#FFC0C0">
          <td>7</td>
          <td>The number of random images correspond to the number of locations and country submitted</td>
          <td align="center">10</td>
        </tr>  
        <tr style="background-color:#FFC0C0">
          <td>8</td>
          <td>The proper name of the location is displayed below the image 
          		(e.g. "New York", "Las Vegas")</td>
          <td align="center">10</td>
        </tr>  
        <tr style="background-color:#FFC0C0">
          <td>9</td>
          <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
          <td align="center">15</td>
        </tr>    
        <tr style="background-color:#FFC0C0">
          <td>10</td>
          <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
          <td align="center">15</td>
        </tr>        
        <tr style="background-color:#FFC0C0">
          <td>11</td>
          <td>The web page uses Bootstrap and has a nice look. </td>
          <td align="center">5</td>
        </tr>        
     <!--   <tr style="background-color:#99E999">
          <td>12</td>
          <td>This rubric is properly included AND UPDATED (BONUS)</td>
          <td width="20" align="center">2</td>
        </tr>   -->  
         <tr>
          <td></td>
          <td>T O T A L </td>
          <td width="20" align="center"><b></b></td>
        </tr> 
      </tbody></table>

    </body>
</html>