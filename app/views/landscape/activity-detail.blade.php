<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

        <style>

        .smaller{ font-size: 14px; }
        .fancybox{}

		.featurecontent .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
		.featurecontent .active.left {left:0;opacity:0;z-index:2;}
		.featurecontent .next {left:0;opacity:1;z-index:1;}


		</style>
    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
             	<div id="scoreboard" class="floatL"></div>
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
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
                                <p>{{$event->content}}</p>
                            @endforeach

                        </div>
                    @endif

                    @if( count($gears) > 0 )
                        <div id="gear-section" class="activity-section">
                            <h2>Recommended {{ $selectedSport->name }} Gear</h2>
                            @foreach( $gears as $gear )
                                <h3>{{$gear->title}}</h3>
                                <p>{{$gear->content}}</p>
                            @endforeach

                        </div>
                    @endif

                    @if( count($locations) > 0 )
                        <div id="location-section" class="activity-section">
                            <h2>Recommended {{ $selectedSport->name }} Locations</h2>
                            @foreach( $locations as $location )
                                <h3>{{$location->title}}</h3>
                                <p>{{$location->content}}</p>
                            @endforeach

                        </div>
                    @endif

                    @if( count($leagues) > 0 )
                        <div id="gear-section">
                            <h2>Local {{ $selectedSport->name }} Leagues</h2>
                            @foreach( $leagues as $league )
                                <h3>{{$league->title}}</h3>
                                <p>{{$league->content}}</p>
                            @endforeach

                        </div>
                    @endif


                    <a id="back-to-sports" class="red nav-noise nav-shadow" href="../activity/">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>


        	</div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>/ls" id="sendstorenumber"></script>
        <script>
        $( document ).ready(function() {

        	document.oncontextmenu = function () { return false; };

			$("#scoreboard").load("/scoreboard.html");

        });
        </script>
    </body>

</html>
