<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/lib/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/lib/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/lib/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">
        
		    <script src="/js/lib/modernizr.min.js"></script>
    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
             	  <iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls/{{ $storedetails[0]->timezone_offset }}"></iframe>
                <a href="/<?php echo $storedetails[0]->store_number;?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

            @include('includes/nav-ls')

        	<div id="main" class="photos">
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
                            <div id = "gear-wrapper-ls">
                                <div class="scrolling-div-ls">

                                    @foreach( $gears as $gear )
                                        <div class="gear-container">
                                            <div class="image-container">
                                                @if($gear->image != "")
                                                <?php $image_files = preg_split('/;/', $gear->image, -1, PREG_SPLIT_NO_EMPTY);?>

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
                            <div id= "store-lat" class="hidden"> {{$storedetails[0]->latitude}} </div>
                            <div id="store-lng" class="hidden"> {{$storedetails[0]->longitude}} </div>
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


        	</div>


        </div>


        <script type="text/javascript" src="/js/lib/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/lib/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="/js/kiosk/vendor/jquery.als-1.7.min.js" type="text/javascript"></script> -->
		<script type="text/javascript" src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
        <script type="text/javascript" src="/js/common.js"></script>
        <script type="text/javascript" src="/js/activity-detail.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{$key}}"> </script>
        
    </body>

</html>
