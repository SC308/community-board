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
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">        
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">  
        <link rel="stylesheet" type="text/css" href="js/fancybox/source/jquery.fancybox.css">
        <style>
        #photos {
          width: 80%;
          margin: auto;
        }
    .fancybox{}

        </style>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/"><img src="images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="photos">

            @foreach($photos as $p)

        
            <a class="fancybox" href="timthumb.php?src=/images/photos/test/{{ $p->path }}&w=1000.jpg" title="<strong>{{ $p->title}}</strong> {{ $p->description}}"><img src="timthumb.php?src=/images/photos/test/{{ $p->path }}&w=300" /></a>

            @endforeach

                          

            </div>
            


            <div id="home-callout" class="fullwidth">
                <img src="images/communityboard-center.jpg" />
            </div>

             <div id="nav" class="fullwidth">
                <a href="/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/flyer"><img src="/images/nav-flyer.png" /></a>
            </div>
        

        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.grid-a-licious.js"></script>
        <script src="js/fancybox/source/jquery.fancybox.js"></script>

        <script> 
        $(function(){
            $("#scoreboard").load("scoreboard-test.html"); 
            
            $("#photos").gridalicious({animate: true, gutter: 5, width: 300, selector: '.fancybox'});
            $('.fancybox').fancybox({ padding : 10, openEffect  : 'elastic', 
                helpers : {
                    title : {
                        type : 'inside'
                    }
                }
            });
        });
        </script>         

    </body>

</html>