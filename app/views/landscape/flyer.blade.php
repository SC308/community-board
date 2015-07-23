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
        <link rel="stylesheet" href="/css/flyerint.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

        <style>

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

        	<div id="main">

	        	<div id="flyer-int">

	            	@foreach($flyer as $f)
                        <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
                    	<a class="fancybox" href="/images/flyer/full/{{$filename}}_1000.jpg"><img src="/images/flyer/thumb/thumb/{{$filename}}_343X400.jpg" /></a>
					@endforeach
	           	</div>

        	</div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox-ls.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
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

			//$("#scoreboard").load("/scoreboard.html");


        });
        </script>
    </body>

</html>
