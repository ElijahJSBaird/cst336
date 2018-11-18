<?php
include('functions.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <link rel='stylesheet' href='css/styles.css' type='text/css' />
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      body {
        background-image: url("img/back5.png"); /* new tag */
        background-size: 100%;
        background-repeat: no-repeat;
      } 
      
    </style>
  </head>
  <body>
    <body>
      <table id="tb" style="width: 31px;">
        <tbody>
        <tr>
          
        <td id="td_logo">
          <img id="logo" src="https://fontmeme.com/permalink/181104/fcea3527232ca1c33649e015717c307b.png" alt="bulletproof-font">
        </td>
        
        
        <td id="td_summit">
          <form action="elijah.php">
            <input type="submit" name="submit" value="Report Diaster"/> 
          </form>
          
        </td>
        
        </tr>
        </tbody>
      </table>
      
      <hr>
      
    <div id="map"></div>
    <?php
        $test = getIncident();
        //echo getSize();
    ?>
    <script type="text/javascript">
      var map;
      
      function initMap() {
        var myLatLng = {lat: 36.653822, lng: -121.797381};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 11
        });
        
        
        //----FIRST DISASTER -------------------------------------------------------------------------- --------------------------------------------------------------------------
        //var image = 'img/earthquake.png';
        var location = JSON.parse('<?php echo json_encode($test); ?>');
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        // var pic = {
        //   url: "img/icons/fire.png", // url
        //   scaledSize: new google.maps.Size(50, 50), // scaled size
        //   origin: new google.maps.Point(0,0), // origin
        //   anchor: new google.maps.Point(0, 0) // anchor
        // };
        var pic;
        var size = <?php echo getSize(); ?>;
        console.log(size);
        for(i = 1; i <= size; i++) {
          pic = {
          url: 'img/icons/'+location[i][0]['disasterType']+'.png', // url
          scaledSize: new google.maps.Size(50, 50), // scaled size
        };
            marker = new google.maps.Marker({
              position: {lat: Number(location[i][0]['latitude']), lng: Number(location[i][0]['longitude'])},
              map: map,
              animation: google.maps.Animation.DROP,
              title: location[i][0]['disasterType'],
              icon: pic
              //'img/icons/'+location[i][0]['disasterType']+'.png'
        
            });
          
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
              } else {
                 marker.setAnimation(google.maps.Animation.BOUNCE);
              }
              infowindow.setContent(location[i][0]['disasterType']);
              infowindow.open(map, marker);
            }
          })(marker, i));
        
        }
        // actual market for disaster
        // var marker = new google.maps.Marker({
        //   position: location,
        //   map: map,
        //   animation: google.maps.Animation.DROP,
        //   title: '6.8 Earthquake',
        //   icon: icon
        // });
      
        // for animation
        // marker.addListener('click', function() {
        //   if (marker.getAnimation() !== null) {
        //     marker.setAnimation(null);
        //   } else {
        //     marker.setAnimation(google.maps.Animation.BOUNCE);
        //   }
        // });
        
        // so textbox can pop open
        // marker.addListener('click', function() {
        //   infowindow.open(map, marker);
        // });
      
        
        marker.setMap(map);
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      }
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClmnFTOdiYmpEXfFyIsqyHn6wtmSWdBxs&callback=initMap"
    async defer></script>
  </body>
  </body>
</html>