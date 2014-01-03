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
    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>              
                <img src="images/sc-logo.jpg" class="floatR" />
            </div>
            
            <div id="home-bio" class="fullwidth">
                <div id="feature-bio">
                    <img src="/images/feature-bio.png" />
                </div>

            </div>

            <div id="home-callout" class="fullwidth">
                <img src="images/communityboard-center.jpg" />
            </div>

            <div id="nav" class="fullwidth">
                <a href="/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/photos"><img src="/images/nav-photos.png" /></a>
            </div>

            <div id="home-flyer" class="fullwidth">
                <img src="/images/current-deal.png" style="padding: 20px 10px 20px 10px; "/>
                <a href="/flyer"><img src="/images/flyer-tall.png" style="padding: 20px 10px 20px 0px;" /></a>
            </div>

        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/main.js"></script>


        <script> 
        $( document ).ready(function() {
            $('#home-bio').animate({
                opacity: 1.0
            }, 1000, function() {

            });
            $( "#feature-bio" ).animate({
                opacity: 1.0,
                left: "+=75"
                }, 1000, function() {
            // Animation complete.
            });

          // $('#home-callout').animate({ boxShadow : "0 0 5px 3px rgba(100,100,200,0.4)" });

             $("#scoreboard").load("scoreboard-test.html"); 
          

            
        });
        </script>          
    </body>

</html>