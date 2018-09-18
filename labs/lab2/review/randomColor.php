<?php
function getLuckyNumber()
{
    do 
    {
        $lucky = rand (1,10);
    }
    while (in_array($lucky, array(4)));
    echo $lucky;
}

function getRandomColor()
{
    echo "background-color: rgba(".rand (0,255).",".rand (0,255).",".rand (0,255).",".(rand (0,10)/10).");";
    echo "color: rgba(".rand (0,255).",".rand (0,255).",".rand (0,255).",".(rand (0,10)/10).");";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Colors & Numbers</title>
        <style>
            body {
                <?php getRandomColor();?>
            }
            h1 {
                <?php getRandomColor();?>
            }
            h2 {
                <?php getRandomColor();?>
            }
        </style>
    </head>
    <body>
        <h1>
            My lucky number is:
            <?php
                getLuckyNumber();
            ?>
            
        </h1>
        <h2>Test h2</h2>
    </body>
</html>