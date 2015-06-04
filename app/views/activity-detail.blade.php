<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number?> Activity Kiosk - {{ $selectedSport->name }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>" >
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>" >
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>



    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/<?=$storedetails[0]->store_number?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>



            <div id="activity-kiosk" class="activity-details">
                <h1>{{ $selectedSport->name }}</h1>

                @if( count($blogs) > 0 )
                    <div id="blog-section" class="activity-section">
                        <h2>{{ $selectedSport->name }} Blog</h2>
                        @foreach( $blogs as $blog )
                            <h3>{{$blog->title}}</h3>
                            <p>{{$blog->content}}</p>
                        @endforeach

                    </div>
                @endif

                @if( count($events) > 0 )
                    <div id="events-section" class="activity-section">
                        <h2>Local {{ $selectedSport->name }} Events</h2>
                        @foreach( $events as $event )
                            <h3>{{$event->title}}</h3>
                            <p>{{$event->description}}</p>
                        @endforeach

                    </div>
                @endif

                @if( count($gears) > 0 )
                    <div id="gear-section" class="activity-section">
                       
                        <h2>Recommended {{ $selectedSport->name }} Gear</h2>
                        <div id = "gear-wrapper">
                        <div class="scrolling-div ">
                            
                            @foreach( $gears as $gear )
                                <div class="gear-container ">
                                    <div class="image-container">
                                        @if($gear->image != "")
                                        <?php $image_files = preg_split('/;/', $gear->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

                                        @foreach( $image_files as $image_file) 
                                        
                                          <img src="/images/kiosk/content/{{$image_file}}" >
                                        
                                        @endforeach
                                        @endif

                                    </div>
                                    <h3>{{$gear->name}}</h3>
                                    <p>{{$gear->description}}</p>
                                </div>
                            @endforeach
                            
                        </div><!-- scrolling div ends --> 
                        </div><!-- gear wrapper ends--> 
                    </div>
                @endif

                @if( count($locations) > 0 )
                    <div id="location-section" class="activity-section">
                        <h2>Recommended {{ $selectedSport->name }} Locations</h2>
                        

                        <div id="map-canvas"></div>
                        <div id= "store-lat" class="hidden"> {{$storedetails[0]->longitude}} </div>
                        <div id="store-lng" class="hidden"> {{$storedetails[0]->latitude}} </div>
                        <div id="store-location-name" class="hidden"> {{$storedetails[0]->store_name}} </div>
                         

                        @foreach($locations as $location)

                         
                            <div class= "location hidden"  
                                data-lat = "{{ $location->latitude }}" 
                                data-lng = "{{$location->longitude}}" 
                                data-description= "{{$location->description}}" 
                                data-name = "{{$location->name}}"
                            > 
                            </div>

                        @endforeach

                    </div>
                   
                @endif

                @if( count($leagues) > 0 )
                    <div id="league-section" class="activity-section">
                        <h2>Local {{ $selectedSport->name }} Leagues</h2>
                        @foreach( $leagues as $league )
                            <h3>{{$league->name}}</h3>
                            <p>{{$league->description}}</p>
                        @endforeach

                    </div>
                @endif


                <a id="back-to-sports" class="red nav-noise nav-shadow" href="../activity/">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            @include('includes/nav')

        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>
        <script src="/js/kiosk/vendor/jquery.als-1.7.min.js" type="text/javascript"></script>
        <script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>" id="sendstorenumber"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLbHzG7lL-Ia4ml1yWY-mvuGpYYozZV8"> </script>

        <script>
       


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
        	
            document.oncontextmenu = function () { return false; };

            $("#scoreboard").load("/scoreboard.html");

             $(".scrolling-div").als({
                visible_items: 4,
                scrolling_items: 1,
                orientation: "horizontal",
                circular: "yes",
                autoscroll: "no"
            });

             


        });

       
        </script>

    </body>

</html>
