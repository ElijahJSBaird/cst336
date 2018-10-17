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
    </body>
</html>