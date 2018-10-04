<?php
// class Card{
//     public $cardValue;
//     public $cardFace;
// }

if (isset($_GET["omit"]))
{
    $omit = $_GET["omit"];
    
}
if (isset($_GET["rows"]))
{
    $rows = $_GET["rows"];
    
}
if (isset($_GET["cols"]))
{
    $cols = $_GET["cols"];
    
}

drawGame($rows, $cols, $omit);

function drawGame($rows, $cols, $omit)
{
   $suit = array("clubs", "spades", "hearts", "diamonds");
   
   $deck = array();
   
   for($i=0; $i<=3; $i++){
       if ($omit == "heart" && $i == 2)
       {
           continue;
       }
       if ($omit == "spade" && $i == 1)
       {
           continue;
       }
       if ($omit == "club" && $i == 0)
       {
           continue;
       }
       if ($omit == "diamond" && $i == 3)
       {
           continue;
       }
       for($j=1; $j<=13; $j++){
           $deck[] = $suit[$i]."/". $j;
        //  $card = new Card;
        //  $card->cardFace = $suits[$i];
        //  $card->cardValue = $i;
        //  $deck[] = $card;
       }
   }
   
   shuffle($deck);
    
    $aceCount = 0;
    $kingCount = 0;
    
    
    for($i=0; $i<$rows; $i++ ){
        for($j = 0; $j < $cols; $j++){
            
            
            // echo $lastChar;
            
            if ($omit == "")
            {
                $cardValue = rand(0,51);
            }
            else
            {
                $cardValue = rand(0,38);
            }
            
            $lastChar = substr($deck[$cardValue], -2);
            // $random = array_pop($deck);
            // echo $card->cardFace;
            // echo $suit[$suitValue];
            // echo $deck[$cardValue];
            
            //make a table
            // echo "<table>";
            // echo "<tr class= 'table-row'>";
            echo "<img src='cards/" . $deck[$cardValue] . ".png'>";
            // echo "</tr>";
            // echo "</table>";
            

            if($lastChar == "/1")
            {
                $aceCount++;
            }
            else if($lastChar == "13")
            {
                $kingCount++;
            }
            
        }
        echo "<br>";
    }
    echo "<br><br>";
    // echo $aceCount."     ".$kingCount;
    if ($aceCount == $kingCount)
    {
        echo "Tie.";
    }
    else if ($aceCount > $kingCount)
    {
        echo "Aces win";
    }
    else if ($aceCount < $kingCount)
    {
        echo "Kings win";
    }
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body align="center">
        <h2> Enter number of rows and columns (1 to 6) </h2>
        <form method="GET">
            <input type="text" name="rows" size="15"/>
            <br><br>
            <input type="text" name="cols" size="15"/>
            <br><br>
            
            <select name="omit">
                <option value="">Select one</option>
                <option value="heart">Heart</option>
                <option value="spade">Spade</option>
                <option value="club">Club</option>
                <option value="diamond">Diamond</option>
            </select>
            <input type="submit" name="submitButton" value="Submit!!"/>
            
        </form>
    </body>
</html>