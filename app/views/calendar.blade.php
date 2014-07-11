<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calendar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <link rel="stylesheet" href="/css/calendar.full.css?<?=time();?>">
        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">  
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">
        
   		<script src="/js/lib/modernizr.min.js"></script>
        


    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>
        
            <div id="calendar-main" class="fullwidth">
            
                <div class="calendar fullwidth" data-color="green" offset="0">

                {{$events_string}}

                </div>
            </div>

            <div id="home-callout" class="fullwidth">
                <img src="/images/communityboard-center.jpg" />
            </div>

			 <div id="nav" class="fullwidth">
                <a href="/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/flyer-int"><img src="/images/nav-flyer-lg.png" /></a>
                <a href="/photos"><img src="/images/nav-photos.png" /></a>
            </div>

        </div>
        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/calendar.full.js"></script>
        
        <script src="js/timer.js"></script>
    
        <script type="text/javascript"> 

		
        $( document ).ready(function() {
        
        	document.oncontextmenu = function () { return false; };
        	
            $("#scoreboard").load("scoreboard.html"); 

/*
            $( ".calendar" ).on( "swipeleft", swipeLeftHandler );
            $( ".calendar" ).on( "swiperight", swipeRightHandler );
*/
             
            function swipeLeftHandler( event ){
                var cm = parseInt($(".calendar").attr('offset'));
                calendarSetMonth(cm+1);
            }

            function swipeRightHandler( event ){
                var cm = parseInt($(".calendar").attr('offset'));
                calendarSetMonth(cm-1);
            }
        });
        </script>       

    </body>

</html>