<?php

include '../inc/dbConnection.php';
$dbConn = startConnection("midterm");

function displayCategories() 
{ 
    global $dbConn;
    
    $sql = "SELECT * FROM mp_town ORDER BY population";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) 
    {
        echo "<option value='".$record['townId']."'>" . $record['townName'] . "</option>";
    }
}

function filterPopulation() 
{
    global $dbConn;
    
    $namedParameters = array();
    $town = $_GET['town_name'];
    
    $sql = "SELECT * FROM mp_town WHERE 1"; //Getting all records from database
    
    if (!empty($product))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND town_name LIKE :town";
         $namedParameters[':town'] = "%$town%";
    }
    
    if (!empty($_GET['category']))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND towm_id =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    $sql .= " ORDER BY population DESC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    foreach ($records as $record) 
    {
        if($record['population'] >= 50000 && $record['population'] <= 80000)
            echo $record['town_name']." - ".$record['population']."<br>";   
    }
}

function descendingPopulation() 
{
    global $dbConn;
    
    $namedParameters = array();
    $town = $_GET['town_name'];
    
    $sql = "SELECT * FROM mp_town WHERE 1"; //Getting all records from database
    
    if (!empty($product))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND town_name LIKE :town";
         $namedParameters[':town'] = "%$town%";
    }
    
    if (!empty($_GET['category']))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND town_id =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    $sql .= " ORDER BY population DESC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    echo "
        <table align='center'>
          <tr>
            <th>City/Town</th>
            <th>Population</th>
          </tr>";
    foreach ($records as $record) 
    {
        echo"
          <tr>
            <td>
                ".$record['town_name']."
            </td>
            <td>
                ".$record['population']."
            </td>
          </tr>
        ";

    }
    echo "</table>";
}

function leastThreePopulation() 
{
    global $dbConn;
    
    $namedParameters = array();
    $town = $_GET['town_name'];
    
    $sql = "SELECT * FROM mp_town WHERE 1"; //Getting all records from database
    
    if (!empty($product))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND town_name LIKE :town";
         $namedParameters[':town'] = "%$town%";
    }
    
    if (!empty($_GET['category']))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND town_id =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    $sql .= " ORDER BY population";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    echo "
        <table align='center'>
          <tr>
            <th>City/Town</th>
            <th>Population</th>
          </tr>";
    $counter = 0;
    foreach ($records as $record) 
    {
        if ($counter == 3)
        {
            break;
        }
        echo "
          <tr>
            <td>
                ".$record['town_name']."
            </td>
            <td>
                ".$record['population']."
            </td>
          </tr>
        ";
        $counter += 1;
    }
    echo "</table>";
}

function sCounties()
{
    {
    global $dbConn;
    
    $namedParameters = array();
    $town = $_GET['town_name'];
    
    $sql = "SELECT * FROM mp_county WHERE 1"; //Getting all records from database
    
    if (!empty($product))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND county_name LIKE :county";
         $namedParameters[':county'] = "%$county%";
    }
    
    if (!empty($_GET['category']))
    {
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND county_id =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    // echo "
    //     <table align='center'>
    //       <tr>
    //         <th>City/Town</th>
    //         <th>Population</th>
    //       </tr>";
    $counter = 0;
    foreach ($records as $record) 
    {
        if ($record['county_name'][0] == 'S')
        {
            echo $record['county_name']."<br>";
        }
        
    }
    echo "</table>";
}
}

?>

<!DOCTYPE html>
<html>
    <style>
    body
    {
        text-align: center;
    }
    td, th 
    {
        text-align: left;
        padding: 8px;
    }
    </style>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
    </head>
    <body>
        
        <h3> Cities/Towns with population between 50,000 and 80,000 </h3>
        <?= filterPopulation() ?>
        <br><br>
        <h3> All Cities/Towns ordered by descending population </h3>
        <?= descendingPopulation() ?>
        <br><br>
        <h3> The three least populated towns </h3>
        <?= leastThreePopulation() ?>
        <br><br>
        <h3> All Counties starting with the letter 's' </h3>
        <?= sCounties() ?>
        <br><br>
        
    </body>
    
      
  <table align="center" border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:lime">
      <td>1</td>
      <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:lime">
      <td>2</td>
      <td>The report shows all towns ordered by population (from biggest to smallest)</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:lime">
      <td>3</td>
      <td>The report lists the three least populated towns</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:lime">
      <td>4</td>
      <td>The report Lists the counties that start with the letter "S"</td>
      <td width="20" align="center">10</td>
    </tr>
<!--     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
 </tr>     -->
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

</html>