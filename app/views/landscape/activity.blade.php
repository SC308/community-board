<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">
        <link rel="stylesheet" type="text/css" href="/css/includes/activity.css">
        

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
             	<iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls"></iframe>
                <a href="/<?php echo $storedetails[0]->store_number;?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

            @include('includes/nav-ls')

        	<div id="main" class="photos">
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
                        <a class="sportSelector nav-noise {{ $colour }} nav-shadow" href="/<?=$storedetails[0]->store_number;?>/ls/activity/{{ $sport->id }}">{{ $sport->name }}</a>

                    @endforeach
                    <br />

                </div>


        	</div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
        <script>
        $( document ).ready(function() {

        	document.oncontextmenu = function () { return false; };

//			$("#scoreboard").load("/scoreboard.html");

        });
        </script>
    </body>

</html>
