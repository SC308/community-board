<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number?> Jumpstart</title>
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



            <div id="jumpstart">

                <div style="width: 500px; float:left; padding: 20px;">
                    <img src="/images/jumpstart-logo-white.jpg" id="js-logo" style="margin: 0px 50px;" />

                </div>

                <div style="width: 500px; float: left; padding: 20px 20px 20px 0px">
                    <h1 style="text-align: center"><img src="/images/jumpstart/js-store-total.jpg" style="position: relative; bottom: 5px" />  ${{ number_format($jumpstart[0]->store_raised) }}</h1>

                    <div id="js-graph" style="width: 400px; height: 222px; margin: 0 auto;">

                        <div id="" style="position: relative; height: 100%; width: 130px; float: left;">
                            <div id="max" style="position: absolute; top: 0; text-align: right !important;">${{ number_format($jumpstart[0]->store_goal) }} &mdash;</div>
                            <div id="min" style="position: absolute; bottom: 10px; text-align: right !important;">$ 0 &mdash;</div>
                        </div>

                        <div id="js-ball" style="position: relative; height: 222px !important; width: 228px !important; float: right;">
                            <div id="fill" style='position: absolute; bottom: 0; background-color: #c00; height: {{ $jsperc }}% !important; width: 100%;'></div>
                            <img src="/images/jumpstart/soccer-ball.png" style="z-index: 100 !important; position: relative; top: 0px;" />
                        </div>
                    </div>

                </div>

                <br class="clear" />


                <div id="js-champ" style="width: 500px; float: left; padding: 20px;">

                    <img src="/images/jumpstart/js-champ-title.jpg" />
                    <p>
                        <img src="/timthumb.php?src=/images/jumpstart/champs/{{ $jumpstart[0]->champ_photo }}&w=230&h=230&a=br" align="left" style="margin-right: 20px;" class="img-thumbnail" />
                        <strong>{{ $jumpstart[0]->champ_name }}</strong><br />
                        {{ $jumpstart[0]->champ_bio }}
                    </p>
                </div>


                <div style="width: 500px; float: left; padding: 20px;">

                    <img src="/images/jumpstart/js-sport-title.jpg" />
                    <p>Sports are an important component in shaping a child’s life, but for 1 in 3 Canadian families, getting their kids involved in sports and recreation is simply unaffordable. together we can help all kids experience the joy and self-confidence that comes through participating in sports.</p>

                    <img src="/images/jumpstart/js-what-is-title.jpg" />
                    <p>Jumpstart is a national charitable program that helps financially disadvantaged kids (ages 4 - 18) participate in organized sports and recreation across Canada. We give kids a sporting chance by covering registration, equipment and/or transportation costs. Our vision at Jumpstart is to help build kids self-confidence, self esteem, leadership and direct them towards a better future; ultimately we want to fufill the dreams of all Canadian kids.</p>


                    <img src="/images/jumpstart/js-link.jpg" />

                </div>

                 <br class="clear" /><br />

                <div style="width: 500px; float: left; padding: 20px;">
                     <img src="/images/jumpstart/js-together.jpg" style="padding-bottom: 20px; width: 395px; margin: 0 auto; padding-left: 45px;" />
                </div>


                <div style="width: 500px; float: left; padding: 20px;">
                    <img src="/images/jumpstart/photos.jpg" />
                </div>


                <br class="clear" />




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


        });
        </script>

    </body>

</html>
