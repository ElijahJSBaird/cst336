<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
        function displayValues() {
            echo "<br>Random value 1: $random_value1"; 
            echo "<br>Random value 2: $random_value2"; 
            echo "<br>Random value 3: $random_value3"; 
        }
        
        function displaySymbol($random_value) {
            
            
            // $random_value = rand(0,2); // Generates a random number from 0 to 2 inclusive
            // echo $random_value;
            
            // if ($random_value == 0) {
            //     $symbol = "seven";
            // } else if ($random_value == 1) {
            //     $symbol = "orange";
            // } else {
            //     $symbol = "cherry";
            // }
            
            switch ($random_value) {
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "orange";
                    break;
                case 2: $symbol = "cherry";
                    break;
                    
            }
            
            echo "<img src=\"img/$symbol.png\" alt=\"$symbol\" title=\"".ucfirst($symbol)."\">";
        }// displaySymbol()
        
        $random_value1 = rand(0,2);
        displaySymbol($random_value1);
        $random_value2 = rand(0,2);
        displaySymbol($random_value2);
        $random_value3 = rand(0,2);
        displaySymbol($random_value3);
        
        displayValues();
        
        if ($random_value1 == $random_value2 && $random_value2 == $random_value3) {
            echo "<h1><br>Jackpot!</h1>";
        }
        
        ?>
        

    </body>
</html>