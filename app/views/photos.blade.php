<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number?> Photos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>" >
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>" >
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

        <style>
        #photos {
          width: 80%;
          margin: auto;
        }

        .smaller{ font-size: 14px; }
        .fancybox{}

        </style>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/<?=$storedetails[0]->store_number?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="photos">
                @foreach($photos as $p)
                    <a class="fancybox" href="/timthumb.php?src=/images/photos/{{ $p->path }}&w=1000.jpg" title="<strong>{{ $p->title}}</strong><br />{{ $p->description}}<?php if($p->location !=""){ echo '<br /><small class=smaller>Location: '.$p->location . '</small>'; } ?><?php if($p->photographer_name !=""){ echo '&nbsp;&nbsp;&nbsp;<small class=smaller>Photographer: '.$p->photographer_name . '</small>'; } ?>"><img src="/timthumb.php?src=/images/photos/{{ $p->path }}&w=300" /></a>
                @endforeach
            </div>

            <div id="nav">
                <div class="nav-callout">
                    <img src="/images/touch-an-area.jpg" />
                </div>

                <div class="nav-row">
                    <a href="/<?=$storedetails[0]->store_number?>/calendar" class="nav-item green nav-noise nav-shadow" >
                        <div class="nav-content">
                            <i class="fa fa-calendar nav-icon"></i>
                            <span class="nav-text">Community Calendar</span>
                        </div>
                    </a>

                    <a href="/<?=$storedetails[0]->store_number?>/photos" class="nav-item yellow nav-noise nav-shadow" >
                        <div class="nav-content">
                            <i class="fa fa-camera-retro nav-icon"></i>
                            <span class="nav-text">Community Photos</span>
                        </div>
                    </a>

                    <a href="/<?=$storedetails[0]->store_number?>/staff" class="nav-item blue nav-noise nav-shadow" >
                        <div class="nav-content">
                            <i class="fa fa-users nav-icon"></i>
                            <span class="nav-text">Employee<br />Bios</span>
                        </div>
                    </a>

                    <a href="/<?=$storedetails[0]->store_number?>/jumpstart" class="nav-item red nav-noise nav-shadow">
                        <img src="/images/jumpstart-nav.png" style="position: relative; top: 20px; left: 30px;"/>
                    </a>

                    <a href="/<?=$storedetails[0]->store_number?>/activity" class="nav-item green nav-noise nav-shadow" >
                        <div class="nav-content">
                            <i class="fa fa-bicycle nav-icon"></i>
                            <span class="nav-text">Activity Advice</span>
                        </div>
                    </a>
                </div>
            </div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>" id="sendstorenumber"></script>

        <script>


        $( document ).ready(function() {

        	document.oncontextmenu = function () { return false; };

            $("#scoreboard").load("/scoreboard.html");

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
