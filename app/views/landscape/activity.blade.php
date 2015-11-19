<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/lib/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/lib/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/lib/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">
        

		<script src="/js/lib/modernizr.min.js"></script>


    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
             	<iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls/{{ $storedetails[0]->timezone_offset }}"></iframe>
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


        <script type="text/javascript" src="/js/lib/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/lib/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
        <script type="text/javascript" src="/js/common.js"></script>
    </body>

</html>
