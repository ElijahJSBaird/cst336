<?php
    $heartlessEnemies = array("shadow", "soldier", "darkside");
    $nobodyEnemies = array("dusk", "samurai", "twilightThorn");
    $unversedEnemies = array("flood", "scrapper", "trinityArmor");
    $nightmareEnemies = array("meowWow", "koomaPanda", "wargoyle");
    $allEnemies = array();
    
    $heartlessInfo = array("There are two kinds of Heartless, Pureblood and Emblem. Pureblood Heartless are natural Heartless, born from the darkness in people's hearts. They are more common in places that are close to or saturated in darkness. Emblem Heartless, on the other hand, were originally created from a machine designed to reproduce the process of a heart being consumed by darkness.",
    "When a person becomes corrupted by darkness, their heart becomes a heartless.",
    "Heartless were the first kind of enemy introduced into the series in Kingdom Hearts (the first game).");
    $nobodyInfo = array("A Nobody is the body and soul of a strong-willed individual who has lost their heart.", 
    "The Nobody symbol resembles a splintered upside-down heart",
    "Nobodies were the second kind of enemy introduced into the series in Kingdom Hearts 2.");
    $unversedInfo = array("The unversed are considered \"the opposite of human life\" and grow from the negative emotions produced by Vanitas, someone created by extracting the darkness from the child Ventus' heart.",
    "The unintentional creator of the Unversed tried to destroy them but could only re-absorb the Unversed. The negativity created by him destroying the Unversed created more Unversed which created a vicious cycle.",
    "The Unversed are the third kind of enemy introduced into the series in Kingdom Hearts: Birth by Sleep.");
    $nightmareInfo = array("Nightmares are the malevolent kind of Dream Eaters which are creatures that reside in the realm of sleep. ",
    "Both Nightmares and the benevolent version, Spirits, are made of the darkness in the sleeping worlds even though they have opposite roles.",
    "Nightmares are the fourth, and currently final, kind of enemy introduced into the series in Kingdom Hearts: Dream Drop Distance.");
    
    
    function getEnemy($type)
    {
        global $heartlessEnemies, $nobodyEnemies, $unversedEnemies, $nightmareEnemies, $allEnemies, 
        $heartlessInfo, $nobodyInfo, $unversedInfo, $nightmareInfo;
        
        $randEnemy = rand(0,2);
        
        $temp = array();
        if ($type == "heartless")
        {
            
            if (in_array($heartlessEnemies[$randEnemy], $allEnemies))//finds if element has not been printed, then prints it
            {
                echo "<h2>".ucfirst($heartlessEnemies[$randEnemy])."</h2>";
                echo "<img src=\"img/heartless/$heartlessEnemies[$randEnemy].png\" alt=\"A Kingdom Hearts enemy named $heartlessEnemies[$randEnemy]\" width=\"200px\">";
                unset($allEnemies[array_search("$heartlessEnemies[$randEnemy]", $allEnemies)]);
                $temp = array_values($allEnemies);
                $allEnemies = array_values($temp);
                echo "<h3>This enemy is a Heartless. </h3><br/>";
                for ($i = 0; $i < 3; $i++)
                {
                    echo $heartlessInfo[$i]."<br/><br/>";
                }
            }
            
        }
        else if ($type == "nobody")
        {
            if (in_array("$nobodyEnemies[$randEnemy]", $allEnemies))
            {
                echo "<h2>".ucfirst($nobodyEnemies[$randEnemy])."</h2>";
                echo "<img src=\"img/nobodies/$nobodyEnemies[$randEnemy].png\" alt=\"A Kingdom Hearts enemy named $nobodyEnemies[$randEnemy]\" width=\"200px\">";
                unset($allEnemies[array_search("$nobodyEnemies[$randEnemy]", $allEnemies)]);
                $temp = array_values($allEnemies);
                $allEnemies = array_values($temp);
                echo "<h3>This enemy is a Nobody. </h3><br/>";
                for ($i = 0; $i < 3; $i++)
                {
                    echo $nobodyInfo[$i]."<br/><br/>";
                }
            }
            
        }
        else if ($type == "unversed")
        {
            if (in_array("$unversedEnemies[$randEnemy]", $allEnemies))
            {
                echo "<h2>".ucfirst($unversedEnemies[$randEnemy])."</h2>";
                echo "<img src=\"img/unversed/$unversedEnemies[$randEnemy].png\" alt=\"A Kingdom Hearts enemy named $unversedEnemies[$randEnemy]\" width=\"200px\">";
                unset($allEnemies[array_search("$unversedEnemies[$randEnemy]", $allEnemies)]);
                $temp = array_values($allEnemies);
                $allEnemies = array_values($temp);
                echo "<h3>This enemy is an Unversed. </h3><br/>";
                for ($i = 0; $i < 3; $i++)
                {
                    echo $unversedInfo[$i]."<br/><br/>";
                }
            }
            
        }
        else if ($type == "nightmare")
        {
            if (in_array("$nightmareEnemies[$randEnemy]", $allEnemies))
            {
                echo "<h2>".ucfirst($nightmareEnemies[$randEnemy])."</h2>";
                echo "<img src=\"img/nightmares/$nightmareEnemies[$randEnemy].png\" alt=\"A Kingdom Hearts enemy named $nightmareEnemies[$randEnemy]\" width=\"200px\">";
                unset($allEnemies[array_search("$nightmareEnemies[$randEnemy]", $allEnemies)]);
                $temp = array_values($allEnemies);
                $allEnemies = array_values($temp);
                echo "<h3>This enemy is a Nightmare. </h3><br/>";
                for ($i = 0; $i < 3; $i++)
                {
                    echo $nightmareInfo[$i]."<br/><br/>";
                }
            }
            
        }
        echo "<hr><h2>Organization XIII is the main antagonist group of Kingdom Hearts 2 and was improved until the final battle in Kingdom Hearts 3</h2><br/>";
        $orgMembers = array("axel", "demyx", "larxene", "lexaeus", "luxord", "marluxia", "roxas", "saix", "vexen", "xaldin", "xemnas", "xigbar", "xion", "xemnas");

        while (sizeof($orgMembers) > 0)
        {
            echo "<img src=\"img/org/".$orgMembers[0].".png\" alt=\"".ucfirst($orgMembers[0])."\" width=\"170px\" height=\"270px\">";
            unset($orgMembers[array_search($nightmareEnemies[0], $orgMembers)]);
            $temp = array_values($orgMembers);
            $orgMembers = array_values($temp);
        }
    }
    
    function start() 
    {
        global $heartlessEnemies, $nobodyEnemies, $unversedEnemies, $nightmareEnemies, $allEnemies;
        $allEnemies = array_merge($heartlessEnemies, $nobodyEnemies);
        $allEnemies = array_merge($allEnemies, $unversedEnemies);
        $allEnemies = array_merge($allEnemies, $nightmareEnemies);
        $enemy = rand(0,3);
        switch($enemy)
        {
            case 0:
                $type = "heartless";
                break;
            case 1:
                $type = "nobody";
                break;
            case 2:
                $type = "unversed";
                break;
            case 3:
                $type = "nightmare";
                break;
        }
        getEnemy($type);
    }
?>

