<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number;?> Activity Kiosk</title>
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
                <a href="/<?=$storedetails[0]->store_number;?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>



            <div id="activity-kiosk">
                <h1>Select an Activity</h1>

                <?php $i = 0;?>
                @foreach($activesports as $sport)
                <?php
switch ($i) {
    case 0:
    case 4:
    case 8:
        $colour = "green";
        break;

    case 1:
    case 5:
    case 9:
        $colour = "yellow";
        break;

    case 2:
    case 6:
    case 10:
        $colour = "blue";
        break;

    case 3:
    case 7:
    case 11:
        $colour = "red";
        break;

    default:
        $colour = "red";
        break;
}
$i++;
?>
                    <a class="sportSelector nav-noise {{ $colour }} nav-shadow" href="/<?=$storedetails[0]->store_number;?>/activity/{{ $sport->id }}">{{ $sport->name }}</a>

                @endforeach
                <br /><br /><br /><br />
            </div>

            @include('includes/nav')

        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>

        <script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>" id="sendstorenumber"></script>


        <script>


        $( document ).ready(function() {

        	document.oncontextmenu = function () { return false; };

            $("#scoreboard").load("/scoreboard.html");


        });
        </script>

    </body>

</html>
