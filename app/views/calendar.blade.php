<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/calendar.full.css">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">  
        <style>
        #calendar-main{display: none;}
        </style>

    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/"><img src="images/sc-logo.jpg" class="floatR" /></a>
            </div>
        
            <div id="calendar-main" class="fullwidth">
            
                <div class="calendar fullwidth" data-color="green" offset="0">

                {{$events_string}}

                </div>
            </div>

            <div id="home-callout" class="fullwidth">
                <img src="images/communityboard-center.jpg" />
            </div>

			 <div id="nav" class="fullwidth">
                <a href="/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/flyer"><img src="/images/nav-flyer-lg.png" /></a>
                <a href="/photos"><img src="/images/nav-photos.png" /></a>
            </div>

        </div>
        <script src="js/lib/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.mobile-1.3.2.min.js"></script>
        <script src="js/calendar.full.js"></script>
        <script src="js/main.js"></script>

        <script> 
        $(function(){
           // $("#scoreboard").load("scoreboard-test.html"); 

            $( ".calendar" ).on( "swipeleft", swipeLeftHandler );
            $( ".calendar" ).on( "swiperight", swipeRightHandler );
             
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