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

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/"><img src="images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="staff">
                <div id="current-staff">
                    <div id="current-staff-bio">

                        <div id="bio">
                        <div id="store-ribbon">
                            West Edmonton Mall
                        </div>                            
                                <h1 class="name"><span class="whitebox"></span>John Smith</h1>
                                <h2 class="dept"><span class="whitebox"></span>Hardgoods: Hockey</h2>                
                                <p class="bio-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deleniti repellendus quibusdam debitis fuga omnis ab! Adipisci, dolore, vitae, eius, totam atque harum facere aut temporibus necessitatibus suscipit magnam soluta.
                                </p>

                                <p class="experience">
                                    Years: 6
                                </p>
                                <p class="sports">
                                    <i class="icon-heart"></i>&nbsp;&nbsp;Sport: Hockey
                                </p>
                                <p class="knowledge">Service Knowledge:
                                    <br /><img src="/images/service-knowledge.png" alt="" style="padding-top: 10px;">
                                </p>
            

                        </div>
                                
                        
                    </div>
                    
                    <div id="bio-nav">

                        @foreach($staff as $s)
                           <a href="javascript:show_{{$s->id}}();"><img src="timthumb.php?src=/images/staff/{{ $s->photo }}&w=124&h=158&a=br" /></a>
                        @endforeach

                    </div>

                </div>


                

            </div>


            <div id="home-callout" class="fullwidth">
                <img src="images/communityboard-center.jpg" />
            </div>

            
            <div id="nav" class="fullwidth">
                <a href="/flyer"><img src="/images/nav-flyer.png" /></a>
                <a href="/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/photos"><img src="/images/nav-photos.png" /></a>
            </div>

        </div>




        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/main.js"></script>



        <script> 
        $( document ).ready(function() {

            $( "#bio" ).animate({
                opacity: 1.0,
                left: "+=300"
                }, 1000, function() {
                // Animation complete.
            });

            $("#scoreboard").load("scoreboard-test.html"); 
        });

            @foreach($staff as $s)
                function show_{{$s->id}}(){

                    $("#bio").css("left", "-300px");
                    $("#bio").css("opacity", "0");
                    $("#current-staff-bio").css("opacity", "0");

                            $(".name").replaceWith('<h1 class="name"><span class="whitebox"></span>{{$s->first}} {{$s->last}}</h1>');
                            $(".dept").replaceWith('<h2 class="dept"><span class="whitebox"></span>{{$s->position}}</h2>');
                            $(".bio-text").replaceWith('<p class="bio-text">{{$s->bio}}</p>');
                            $("#current-staff-bio").css("background", "transparent url('timthumb.php?src=/images/staff/{{ $s->photo }}&h=947') bottom center no-repeat");

                    $( "#bio" ).animate({
                        opacity: 1.0,
                        left: "+=300"
                        }, 1000, function() {
                    });

                  $( "#current-staff-bio" ).animate({
                        opacity: 1.0
                        }, 1000, function() {
                    });
                }
            @endforeach
        </script>         

    </body>

</html>