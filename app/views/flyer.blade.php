<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number?> Flyer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">  
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

            <div id="flyer">
                
                @foreach($flyer as $f)
                    <a class="fancybox" href="/timthumb.php?src=/images/flyer/{{$f->path}}&w=1000.jpg"><img src="/timthumb.php?src=/images/flyer/{{$f->path}}&a=t&w=400&h=550" /></a>
                @endforeach
                
           </div>

            <div id="home-callout" class="fullwidth">
                <img src="/images/communityboard-center.jpg" />
            </div>

             <div id="nav" class="fullwidth">
<!--                 <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos.png" /></a> -->
                <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/jumpstart"><img src="/images/nav-js-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-cal-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos-sm.jpg" /></a>                
            </div>

        </div>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>
        
        <script src="/js/timer.js"></script>
        <script> 

			
        $( document ).ready(function() {
        	
        	document.oncontextmenu = function () { return false; };
        	
            $('.fancybox').fancybox({ padding : 10, openEffect  : 'elastic', 
                helpers : {
                    title : {
                        type : 'inside'
                    }
                }
            });

            $("#scoreboard").load("scoreboard.html"); 
        });
        </script>       

    </body>

</html>