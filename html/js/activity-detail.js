$( document ).ready(function() {

  function initialize() {

          var store_lat  = parseFloat(document.getElementById("store-lat").innerHTML);
          var store_lng  = parseFloat(document.getElementById("store-lng").innerHTML);
          var store_location = new google.maps.LatLng(store_lat,store_lng);
          var store_name = document.getElementById("store-location-name").innerHTML;
          var iconBase = 'https://maps.google.com/mapfiles/kml/paddle/';

          var locations   = document.getElementsByClassName("location");
          var markers     = new Array();
          var location_names = new Array() ;
          var location_description = new Array();

          for(var i=0; i<locations.length ; i++)
          {
            lat_lng_set = new Array(parseFloat(locations[i].getAttribute('data-lat')),
                                    parseFloat(locations[i].getAttribute('data-lng')));

            markers.push(lat_lng_set);
            location_names.push(locations[i].getAttribute('data-name'))
            location_description.push(locations[i].getAttribute('data-description'))
          }




          var mapOptions = {
            center:  store_location,
            zoom: 10,
            streetViewControl: false,
          };

          var map = new google.maps.Map(document.getElementById('map-canvas'),
              mapOptions);

          /*initialize store marker*/
          var store_marker = new google.maps.Marker({
                position: new google.maps.LatLng(store_lat, store_lng),
                title:store_name,
                icon: iconBase + 'grn-circle.png'
              });
          google.maps.event.addListener(store_marker, 'click', function() {
            var infowindow = new google.maps.InfoWindow({
              content:this.title
            });
            infowindow.open(map,this);
          });
          store_marker.setMap(map);

          /*initialize store markers*/
          for(var j=0 ; j<markers.length; j++ ){


              var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[j][0], markers[j][1]),
                title:'<b>' + location_names[j] + ' </b> <p>' + location_description[j] + '</p>'

              });



              google.maps.event.addListener(marker, 'click', function() {
                var infowindow = new google.maps.InfoWindow({
                  content:this.title
                });
                infowindow.open(map,this);
              });

              marker.setMap(map);

          }



    }

    google.maps.event.addDomListener(window, 'load', initialize);



});