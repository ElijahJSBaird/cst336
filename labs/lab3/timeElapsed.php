<?php session_start();
      //session_destroy();
?>
<?php
  if(!isset($_SESSION['totalGames'])) {
  $_SESSION['totalGames'] = 0;
  $_SESSION['totalTime'] = 0;
  }
?>
<?php
    function displayElapsedTime() {
      global $start;
      $elapsedSecs = microtime(true) - $start;
      echo "Duration: " . round($elapsedSecs, 6) . " seconds " . "<br />";
      $_SESSION['totalGames']++;
      $_SESSION['totalTime'] += $elapsedSecs;
      $ave = $_SESSION['totalTime'] / $_SESSION['totalGames'] ;
      echo "Average Time: " . round($ave, 6) . "secs" . "<br />";
      echo "Rounds of Game Played: " . $_SESSION['totalGames'];
    }
?>    
