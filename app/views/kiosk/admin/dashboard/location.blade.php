<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLbHzG7lL-Ia4ml1yWY-mvuGpYYozZV8">
    </script>
    
  </head>
  <body>
<div id="map-canvas"></div>
<div id= "store-lat"> {{$store_location->latitude}} </div>
<div id="store-lng" > {{$store_location->longitude}} </div>
<div id="store-location-name"> {{ $store_location->store_name }} </div>
<?php $location_list = array(); 
      $counter = 1;
?> 

@foreach($locations as $location)

  {{Form::input('text', 'Location'.$counter, $location->name , ['data-lat' => $location->latitude, 
                                                                'data-lng' => $location->longitude,
                                                                'class'=>'location'])}}
    <?php 
        $counter++;
    ?>
@endforeach



  <script type="text/javascript">
      function initialize() {

          var store_lat  = parseFloat(document.getElementById("store-lat").innerHTML);
          var store_lng  = parseFloat(document.getElementById("store-lng").innerHTML);
          var store_location = new google.maps.LatLng(store_lat,store_lng);
          var store_name = document.getElementById("store-location-name").innerHTML;
          

          var locations   = document.getElementsByClassName("location");
          var markers     = new Array();
          var location_names = new Array() ;
          
          for(var i=0; i<locations.length ; i++)
          {
            lat_lng_set = new Array(parseFloat(locations[i].getAttribute('data-lat')), 
                                    parseFloat(locations[i].getAttribute('data-lng')));
            
            markers.push(lat_lng_set);
            location_names.push(locations[i].value)
          }

          
         

          var mapOptions = {
            center:  store_location,
            zoom: 12,
            
          };

           var map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);
          
          var store_marker = new google.maps.Marker({
                position: new google.maps.LatLng(store_lat, store_lng),
                title:store_name
              });
          store_marker.setMap(map);
          for(var j=0 ; j<markers.length; j++ ){
              var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[j][0], markers[j][1]),
                title:location_names[j]
              });
              marker.setMap(map);

          }
          

          
        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </body>


</html>