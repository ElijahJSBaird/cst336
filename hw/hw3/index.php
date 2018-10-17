<?php

$total = 0;
$done = 4;

if ($_GET["q1"] == "yes")
{
    $total++;
}
else if ($_GET["q1"] == "")
{
    if (isset($_GET["submitBtn"]))
    {
        echo "<h2>Question 1 must be answered.</h2>";
        $done--;
    }
} 

if ($_GET["q2"] == "screech")
{
    $total++;
}
else if ($_GET["q2"] == "")
{
    if(isset($_GET["submitBtn"]))
    {
        echo "<h2>Question 2 must be answered.</h2>";
        $done--;
    }
} 

if ($_GET["angela"] == "on" && $_GET["kevin"] == "on" && $_GET["oscar"] == "on" && 
    $_GET["andy"] == "" && $_GET["ryan"] == "" && $_GET["kelly"] == "")
{
    $total++;
}
else if ($_GET["angela"] == "" && $_GET["kevin"] == "" && $_GET["oscar"] == "" && 
         $_GET["andy"] == "" && $_GET["ryan"] == "" && $_GET["kelly"] == "")
{
    if(isset($_GET["submitBtn"]))
    {
        echo "<h2>Question 3 must be answered.</h2>".$_GET["angela"];
        $done--;
    }
} 

if ($_GET["q4"] == 9)
{
    $total++;
}
else if ($_GET["q4"] == "")
{
    if(isset($_GET["submitBtn"]))
    {
        echo "<h2>Question 4 must be answered.</h2>";
        $done--;
    }
}

if ($_GET["q5"] == "dwight")
{
    $total++;
}
else if ($_GET["q5"] == "")
{
    if(isset($_GET["submitBtn"]))
    {
        echo "<h2>Question 5 must be answered.</h2>";
        $done--;
    }
}

if ($done == 4 && isset($_GET["submitBtn"]))
{
    echo "<h1>Score: ".$total."/5</h1>";
}

function wasChecked($name)
{
    if ($_GET[$name])
    {
        echo '<input type="checkbox" name="'.$name.'" checked="checked"/>';
    }
    else
    {
        echo '<input type="checkbox" name="'.$name.'"';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> The Office (US) Quiz </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>The Office (US) Quiz</h1>
        <h2>SPOILER ALERT!</h2>
        <form method="GET">
            <div id="question1">
                <h3>1. Does Pam marry Jim?</h3>
                <input type="radio" name="q1" value="yes" id="q1_yes">
                <label for="q1_yes"> Yes </label>
                <input type="radio" name="q1" value="no" id="q1_no">
                <label for="q1_no"> No </label><br>
            </div>
            <br><br>
            <div id="question2">
                <h3>2. Which Michael is not like the others?</h3>
                <select name="q2">
                    <option value=""> Select One </option>
                    <option value="date">Date Mike</option>
                    <option value="scott">Michael Scott</option>
                    <option value="scarn">Michael Scarn</option>
                    <option value="screech">Michael Screech</option>
                    <option value="scotch">Michael Scotch</option>
                    <option value="prison">Prison Mike</option>
                    <option value="mykonos">Mykonos</option>
                </select>
            </div>
            <br><br>
            <div id="question3">
                <h3>3. Which of these workers are from accounting?</h3>
                Angela 
                <input type="checkbox" name="angela"/>
                Andy 
                <input type="checkbox" name="andy"/>
                Oscar 
                <input type="checkbox" name="oscar"/>
                <br><br>
                Kevin 
                <input type="checkbox" name="kevin"/>
                Ryan 
                <input type="checkbox" name="ryan"/>
                Kelly 
                <input type="checkbox" name="kelly"/>
            </div>
            <br><br>
            <div id="question4">
                <h3>4. How many seasons of the show are there?</h3>
                <input type="number" name="q4" min="1" max="10"/>
            </div>
            <br><br>
            <div id="question5">
                <h3>5. Who does Jim prank the most?</h3>
                <select name="q5">
                    <option value=""> Select One </option>
                    <option value="pam">Pam</option>
                    <option value="dwight">Dwight</option>
                    <option value="phyllis">Phyllis</option>
                    <option value="stanley">Stanley</option>
                    <option value="creed">Creed</option>
                    <option value="meredith">Meredith</option>
                    <option value="toby">Toby</option>
                    <option value="darryl">Darryl</option>
                </select>
            </div>
            <br><br>
            
            <input id="layoutDiv" type="submit" name="submitBtn" value="Submit!!" />
            
        </form>
        
        <?php 
            if ($done == 4 && isset($_GET["submitBtn"]))
            {
                echo '
                <hr>
                <h1>Results</h1>
                <form method="GET">
                    <div id="question1">';
                    if ($_GET["q1"] == "no" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/red_x.png\" alt=\"A red x\" width=\"30px\">";
                        $yes = false;
                    }
                    else if ($_GET["q1"] == "yes" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/green_check.png\" alt=\"A A green check mark\" width=\"30px\">";
                        $yes = true;
                    }
                    echo '<h3>1. Does Pam marry Jim?</h3>';
                    if ($yes)
                    {
                        echo '
                        <input type="radio" name="q1" value="yes" id="q1_yes" checked=true>
                        <label for="q1_yes"> Yes </label>
                        <input type="radio" name="q1" value="no" id="q1_no">
                        <label for="q1_no"> No </label><br>
                        ';
                    }
                    else
                    {
                        echo '
                        <input type="radio" name="q1" value="yes" id="q1_yes">
                        <label for="q1_yes"> Yes </label>
                        <input type="radio" name="q1" value="no" id="q1_no" checked=true>
                        <label for="q1_no"> No </label><br>
                        ';
                    }
                    echo '
                    </div>
                    <br><br>
                    <div id="question2">';
                    if ($_GET["q2"] != "screech" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/red_x.png\" alt=\"A red x\" width=\"30px\">";
                    }
                    else if ($_GET["q2"] == "screech" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/green_check.png\" alt=\"A A green check mark\" width=\"30px\">";
                    }
                    echo '
                        <h3>2. Which Michael is not like the others?</h3>
                        <select name="q2">';
                    $michaels = array("date", "scott", "scarn", "screech", "scotch", "prison", "mykonos");
                    $fullname = array("Date Mike", "Michael Scott", "Michael Scarn", "Michael Screech", "Michael Scotch", "Prison Mike", "Mykonos");
                    for ($i = 0; $i < 7; $i++)
                    {
                        if ($_GET["q2"] == $michaels[$i])
                        {
                            echo '<option value="'.$michaels[$i].'">'.$fullname[$i].'</option>';
                            array_splice($michaels, $i, 1);
                            array_splice($fullname, $i, 1);
                        }
                    }
                    for ($i = 0; $i < 6; $i++)
                    {
                        echo '<option value="'.$michaels[$i].'">'.$fullname[$i].'</option>';
                    }
                    echo '
                        </select>
                    </div>
                    <br><br>
                    <div id="question3">';
                    if (($_GET["angela"] != "on" || $_GET["kevin"] != "on" || $_GET["oscar"] != "on") 
                         && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/red_x.png\" alt=\"A red x\" width=\"30px\">";
                    }
                    else if (($_GET["angela"] == "on" && $_GET["kevin"] == "on" && $_GET["oscar"] == "on" && 
                         $_GET["andy"] == "" && $_GET["ryan"] == "" && $_GET["kelly"] == "") 
                         && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/green_check.png\" alt=\"A green check mark\" width=\"30px\">";
                    }
                    echo '
                        <h3>3. Which of these workers are from accounting?</h3>
                        Angela 
                        ';
                        if ($_GET["angela"])
                        {
                            echo '<input type="checkbox" name="angela" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="angela"/>';
                        }
                    echo '
                        Andy';
                        if ($_GET["andy"])
                        {
                            echo '<input type="checkbox" name="andy" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="andy"/>';
                        }
                    echo '
                        Oscar';
                        if ($_GET["oscar"])
                        {
                            echo '<input type="checkbox" name="oscar" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="oscar"/>';
                        }
                    echo '
                        <br><br>
                        Kevin';
                        if ($_GET["kevin"])
                        {
                            echo '<input type="checkbox" name="kevin" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="kevin"/>';
                        }
                    echo '
                        Ryan';
                        if ($_GET["ryan"])
                        {
                            echo '<input type="checkbox" name="ryan" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="ryan"/>';
                        }
                    echo '
                        Kelly';
                        if ($_GET["kelly"])
                        {
                            echo '<input type="checkbox" name="kelly" checked="checked"/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="kelly"/>';
                        }
                    echo '
                    </div>
                    <br><br>
                    <div id="question4">';
                    if ($_GET["q4"] != "9" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/red_x.png\" alt=\"A red x\" width=\"30px\">";
                    }
                    else if ($_GET["q4"] == "9" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/green_check.png\" alt=\"A A green check mark\" width=\"30px\">";
                    }
                    echo '
                        <h3>4. How many seasons of the show are there?</h3>
                        <input type="number" name="q4" min="1" max="10" value="'.$_GET["q4"].'"/>
                    </div>
                    <br><br>
                    <div id="question5">';
                    if ($_GET["q5"] != "dwight" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/red_x.png\" alt=\"A red x\" width=\"30px\">";
                    }
                    else if ($_GET["q5"] == "dwight" && isset($_GET["submitBtn"]))
                    {
                        echo "<img src=\"img/green_check.png\" alt=\"A A green check mark\" width=\"30px\">";
                    }
                    
                    
                    
                    
                    echo '
                        <h3>5. Who does Jim prank the most?</h3>
                        <select name="q5">';
                        $names = array("pam", "dwight", "phyllis", "stanley", "creed", "meredith", "toby", "darrly");
                        for ($i = 0; $i < 8; $i++)
                        {
                            if ($_GET["q5"] == $names[$i])
                            {
                                echo '<option value="'.$names[$i].'">'.ucfirst($names[$i]).'</option>';
                                array_splice($names, $i, 1);
                            }
                        }
                        for ($i = 0; $i < 7; $i++)
                        {
                            echo '<option value="'.$names[$i].'">'.ucfirst($names[$i]).'</option>';
                        }
                    echo '
                        </select>
                    </div>
                    <br><br>
                    
                </form>
                ';
            }
        ?>
        
        <footer>
            <hr id="hr100"/>
            <small>
            CST 336 2018 &copy; Baird <br/>
            
            <strong>Disclaimer:</strong> This quiz is about the US version of The Office. I did not create any of the characters, I only created the questions about them.
            <br/><br/>
            The information displayed on this page for academic purposes only. <br/>
            <br/>
            <img src="../../img/csumb_logo.jpg" alt="CSUMB logo" title="This is
            the CSUMB logo"/>
            <img src="../../img/buddy_verified.png" alt="Buddy Verified" 
            title="This is the buddy verification badge"/>
            </small>
        </footer>
    </body>
</html>