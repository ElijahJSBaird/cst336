<?php

$monthDays = array("November"=>30, "December"=>31, "January"=>31, "February"=>28);

$France = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
$Mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
$USA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");

function displayCalendar($log, $month, $dates, $country, $locations) {
    global $monthDays;
    echo "<h1>$month Itinerary</h1>";
    echo "<h3>$log</h3>";
    echo "<table style='width:100%'>";
    $height = ($monthDays[$month] % 7 == 0 ? 4 : 5);
    for ($y = 0; $y < $height; $y++) {
        echo "<tr>";
        for ($x = 1; $x <= 7; $x++) {
            echo "<td>";
            $currDay = ($y * 7) + $x;
            if ($currDay > $monthDays[$month]) continue;
            echo "<p>$currDay</p>";
            if (look($currDay, $dates)) {
                $loc = array_pop($locations);
                echo "<img src='img/$country/" . $loc . ".png'>";
                $loc = str_replace("_"," ",$loc);
                echo "<p>" . ucwords($loc) . "</p>";
            }
            echo "</td>";
        }
        echo "<tr>";
    }
    echo "</table>";
}
function look($needle, $haystack) {
    for ($i = 0; $i < count($haystack); $i++) {
        if ($needle == $haystack[$i]) return true;
    }
    return false;
}

function getDates($max, $numDays) {
    $days = array();
    for ($i = 0; $i < $numDays; $i++) {
        $day = rand(1, $max);
        while (look($day, $days)) {
            $day = rand(1, $max);
        }
        array_push($days, $day);
    }
    return $days;
}

function getLocations($max, $locations, $order) {
    if ($order == 1)
        sort($locations);
    else if ($order == 2)
        array_reverse($locations);
    else
        shuffle($locations);
        
    $places = array();
    for ($i = 0; $i < $max; $i++) {
        $loc = array_pop($locations);
        array_push($places, $loc);
    }
    return $places;
}

function validate(&$logs) {
    
    $errorFree = true;
    if ($_GET['month'] == "") {
        $errorFree = false;
        echo "<h2>You must select a month!</h2>";
    }
    if (!isset($_GET['numLocations'])) {
        $errorFree = false;
        echo "<h2>You must specify the number of locations!</h2>";
    }
    if ($errorFree) {
        array_push($logs, makeItinerary($_GET['month'], $_GET['numLocations'], $_GET['country'], $_GET['order']));
        showHistory($logs);
    }
}
function showHistory($logs) {
    echo "<h4>Monthly Itinerary</h4>";
    for ($i = 0; $i < count($logs); $i++) {
        echo "<p>" . $logs[$i] . "</p>";
    }
}
function makeItinerary($month, $numLocations, $country, $order) {
    global $monthDays;
    global ${$country};
    $log = "Month: $month, Visiting $numLocations places in $country";
    echo $log . $monthDays[$month];
    $dates = getDates($monthDays[$month], $numLocations);
    $locations = getLocations($numLocations, ${$country}, $order);
    displayCalendar($log, $month, $dates, $country, $locations);
    return $log;
}
?>