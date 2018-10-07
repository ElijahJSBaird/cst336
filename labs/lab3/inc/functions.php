<?php
    $deck = array();
    $card = array();
    $players = array("Shuyan","Elijah","Francisco","Jesse");
    $resPlayers = array();
    $totals = array(0, 0, 0, 0);
    $gtotal;
    $indices = array();
    $diff = array();
    
    //print_r($players);

    function buildDeck() {
        global $deck;
        for ($i = 0; $i < 13; $i++) {
                array_push($deck, array("clubs",  $i + 1));
                array_push($deck, array("diamonds",  $i + 1));
                array_push($deck, array("hearts",  $i + 1));
                array_push($deck, array("spades",  $i + 1));
        }
        //print_r($deck);
    }
    
    function retrieveCard() {
        global $deck;
        global $card;
        $card =  array_pop($deck);
        //echo "***$card[0]***$card[1]***";
    }
    
    function winnerCalc() {
        global $totals;
        global $diff;
        global $indices;
        global $resPlayers;
        global $gtotal;
        //$boolio = false;
        for ($i = 0; $i < 4; $i++) {
            if ($totals[$i] <= 42) {
                array_push($diff, 42 - $totals[$i]);
            } else {
                array_push($diff, 1000);
            }
        }
        //echo "Diff: ";
        //print_r($diff);
        $temp = $diff[0];
        array_push($indices, 0);  //**************  By assuming the first index is the winner we eliminate the need for the boolean conditonal.
        //echo "    temp is $temp"; //                We can't use any of this because it causes a problem.
        for ($j = 1; $j < count($diff); $j++) {   // We need to compare $diff[$j] to $diff[j+1], and stop early before the comparison goes out of bounds.
            //echo "WHAT THE HELL IS GOING ON HERE?!";
            
            if ( $temp > $diff[$j] ) {
                $temp = $diff[$j];
                //echo "    temp is $temp";
                for ($k = 0; $k < count($indices); $k++) {
                    array_pop($indices);
                }
                array_push($indices, $j);  //Clear $indices of false winners.
                //$boolio = true;
            } else if ( $temp == $diff[$j] && $temp < 1000 ) {
                array_push($indices, $j);
                //$boolio = true;
            }
        }
        /*if ( $boolio == false || ) {
            array_push($indices, 0);
        }*/
        
        //echo "<br/>";
        //echo "indices: ";
        //print_r($indices);
        //echo "<br/>";
        //echo "resPlayers: ";
        //print_r($resPlayers);
        echo "<br/>";
        echo "The Victorius!! <br/><br/>";
        $gtotal = array_sum($totals);
        //echo "******HEYYYY Gtotal!! $gtotal";
        for ($h = 0; $h < count($indices); $h++) {
            $temp2 = $indices[$h];
            //echo "temp2 is $temp2 <br/>";
            echo "$resPlayers[$temp2] has " . $gtotal/count($indices) . " points! ";
            if (count($indices) - $h > 1) {
                echo "and ";
            }
        }
    }
    
    function dealCards($i) {  //display cards and track total.
    global $card;
    global $players;
    global $gtotal;
    global $totals;
    global $resPlayers;
    $nerve = rand(0, 15);  //$nerve is a stat that measures how brave our players are at any given time.  
    //print_r($players);
    $temp = array_pop($players);    //  How we're dealing with the loops.
    array_push($resPlayers, $temp); //  We don't want to lose track of the order of players just yet.
    echo "<div id='hand'>";
    echo "<img src='img/players/$temp.png'/>";

        while($totals[$i] < 29 + $nerve) {
            retrieveCard();
            
            echo "<img src='img/cards/$card[0]/$card[1].png'/>";
           
            $totals[$i] += $card[1];
        }
        if ($totals[$i] <= 42) {
            echo "$temp has $totals[$i] points! ";
        } else if ($totals[$i] > 42) {
            echo "$temp, $totals[$i] points is too much... Why didn't you stop?  WHY?";
        }
            echo "</div>";
            echo "<br/><br/><br/><br/><br/><br/><br/>";
    }
?>