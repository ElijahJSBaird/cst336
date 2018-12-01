<?php
    //include_once('index.php');
    include 'dbConnectionMapIt.php';
    $dbConn = startConnection("mapIt");

    function getIncident() {
        global $dbConn;
        $incident = array();
        //$result = array();
        
        $sql = "SET @newid=0; UPDATE mi_reports SET reportId=(@newid:=@newid+1) ORDER BY reportID;";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $sql = "SELECT * FROM `mi_reports`";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

        foreach ($records as $record) {
            // array_push($incident, $record['latitude']);
            // array_push($incident, $record['longitude']);
            // array_push($incident, $record['disasterType']);
            // array_push($result, $incident);
            $incident[$record['reportId']][] = array('latitude' => $record['latitude'],
                                                     'longitude' => $record['longitude'],
                                                     'disasterType' => $record['disasterType']);
        }
        return $incident;
    }
    
    function getSize() {
        global $dbConn;
        $size = 0;
        //$result = array();
        
        $sql = "SELECT COUNT(*) AS total FROM mi_reports";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //$size = $records['total'];
        foreach ($records as $record) {
            $size = $record['total'];
        }
        
        return $size;
    }
    
    function summitForm() {
        global $dbConn;
    
        $location = $_POST['location'];
        //echo "<h1>".$location."</h1>";
        $latitude = 36.65003;
        $longitude = -121.794197;
        
        if(isset($_POST['test'])) {
            $disaster = $_POST['test'];
        }
        
        //echo "<h1>".$disaster."</h1>";
        
        if ($location == "sandCity")
        {
            $latitude = 36.6171819;
            $longitude = -121.84828549999997;
        }
        if ($location == "monterey")
        {
            $latitude = 36.6002378;
            $longitude = -121.89467609999997;
        }
        if ($location == "salinas")
        {
            $latitude = 36.6777372;
            $longitude = -121.65550129999997;
        }
        if ($location == "carmel")
        {
            $latitude = 36.5552386;
            $longitude = -121.92328789999999;
        }
        if ($location == "marina")
        {
            $latitude = 36.68440289999999;
            $longitude = -121.80217299999998;
        }
        if ($location == "seaside")
        {
            $latitude = 36.6149217;
            $longitude = -121.82209799999998;
        }
        
        
        $sql = "INSERT INTO mi_reports (latitude, longitude, disasterType) 
                VALUES (:latitude, :longitude, :disasterType);";
        $np = array();
        $np[":latitude"] = $latitude;
        $np[":longitude"] = $longitude;
        $np[":disasterType"] = $disaster;
    
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    
        
        echo "<h3>Your report has been added.</h3>";
    }
    
?>