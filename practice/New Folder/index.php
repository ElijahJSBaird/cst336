<?php
    session_start();
    include 'functions.php';
    if (!isset($_SESSION['logs'])) {
        $_SESSION['logs'] = array();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <h1>Winter Vacation Planner!</h1>
        <form>
            <p>Select Month: 
            <select name="month">
                <option value="">Select</option>
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
            </select>
            </p>
            <p>Number of locations: 
                <input type="radio" name="numLocations" value="3">Three 
                <input type="radio" name="numLocations" value="4">Four 
                <input type="radio" name="numLocations" value="5">Five
            </p>
            <p>Select Country: 
            <select name="country">
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="France">France</option>
            </select>
            </p>
            <p>Visit locations in alphabetical order:
                <input type="radio" name="order" value="1">A-Z 
                <input type="radio" name="order" value="2">Z-A 
            </p>
            <input type="submit" value="Create Itinerary"/>
        </form>
        
        <?php
            if (isset($_GET['country'])) {
                validate($_SESSION['logs']);
            }
        ?>
    </body>
</html>