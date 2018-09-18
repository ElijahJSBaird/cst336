<?php

    function displayArray()
    {
        global $symbols;
        
        echo "<hr>";
        print_r($symbols);
        for ($i = 0; $i < count($symbols); $i++)
        {
            echo $symbols[$i];
            if ($i < (count($symbols) - 1))
            {
                echo ", ";
            }
        }
    }

    $symbols = array("seven");
    print_r($symbols); // displays array's content
    
    $points = array("orange"=>250, "cherry"=>500);
    
    $points["seven"] = 1000;
    
    array_push($symbols, "orange", "grape");
    print_r($symbols);
    
    $symbols[] = "cherry"; // leaving square brackets blank will act like a push
    print_r($symbols); // will print seven, orange, grape, and cherry
    
    $symbols[2] = "cherry";// putting an index into the brackets will change the element in that index and not increase the size
    print_r($symbols); 
    
    displayArray();
    
    sort($symbols);
    displayArray();
    
    rsort($symbols);
    displayArray();
    
    unset($symbols[2]); // removes element in array by index, does not re-index
    displayArray();
    
    $symbols = array_values($symbols); // re-indexes
    displayArray();
    
    shuffle($symbols);
    displayArray();
    
    echo "<hr>";
    
    $indexes = array();
    
    for ($i = 0; $i < 3; $i++)
    {
        $indexes[] = $symbols[array_rand($symbols)];
        echo "<img src=\"../lab2/img/".$indexes[$i].".png\">";
    }
    
    echo "<hr>";
    print_r($indexes);
    
    if ($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2])
    {
        echo "Congrats!! You won ".$points[$symbols[$indexes[0]]]." points!!";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Review Arrays</title>
    </head>
    <body>

    </body>
</html>