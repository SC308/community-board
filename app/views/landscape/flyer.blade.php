<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name ?></title>
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
             	<div id="scoreboard" class="floatL"></div>
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

        	<div id="nav">
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/staff"/><img src="/images/nav-ls-staff.jpg" /></a>
        		<!-- <a href="/<?php echo $storedetails[0]->store_number ?>/ls/flyer-int"/><img src="/images/nav-ls-flyer.jpg" /></a> -->
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/calendar"/><img src="/images/nav-ls-calendar.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/photos"/><img src="/images/nav-ls-photos.jpg" /></a>
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls/jumpstart"/><img src="/images/nav-ls-jumpstart.jpg" /></a>
        	</div>

        	<div id="main">

	        	<div id="flyer-int">
	        		<?php
	            	// allow_url_fopen=0
	            	//$content = file_get_contents('http://www.flyertown.ca/flyers/sportchek?type=1&postal_code=M4P+2H9&filler=#!/flyers/sportchek-sportchek?flyer_run_id=26205');
/*
	            	$content = file_get_contents('http://www.flyertown.ca/flyers/sportchek-sportchek?sf_any=true&flyer_run_id=19880&type=1&postal_code=M4P%202H9#!/flyers/sportchek-sportchek?flyer_run_id=19880');

	            	$content = str_replace('"store_locator_url":"http://www.sportchek.ca/storeLocator/index.jsp"','"store_locator_url":null', $content);

					$content = preg_replace('/"url"\:"http:\/\/www\.sportchek\.ca\/product\/index\.jsp\?productId=\d+&cid=wishabi",/', '', $content);
					$content = preg_replace('/"url"\:"http:\/\/www\.sportchek\.ca\/category\/index\.jsp\?categoryId=\d+&cid=wishabi",/', '', $content);
				    $content = preg_replace('/"url"\:"http:\/\/www\.sportchek\.ca\/shop\/index\.jsp\?categoryId=\d+&cid=wishabi",/', '', $content);
				    $content = preg_replace('/"url"\:"http:\/\/www\.sportchek\.ca\/family\/index\.jsp\?categoryId=\d+&cid=wishabi",/', '', $content);

				    $content = preg_replace('/<div class="wishabi-scrollview" style="position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px; overflow: visible;">/', '<div class="wishabi-scrollview" style="position: absolute; left: 0px; right: 0px; top: 0px; bottom: 30px; overflow: visible;">', $content); 		    

	            	$content = str_replace('<link href="','<link href="http://www.flyertown.ca', $content);
	            	$content = str_replace('<script src="','<script src="http://www.flyertown.ca', $content);
	            	$content = str_replace('<link rel="stylesheet" href="','<link rel="stylesheet" href="http://www.flyertown.ca', $content);
*/
//	            	echo $content;
	            	?>
	            	
	            	@foreach($flyer as $f)
                    	<a class="fancybox" href="/timthumb.php?src=/images/flyer/{{$f->path}}&w=1000.jpg"><img src="/timthumb.php?src=/images/flyer/{{$f->path}}&a=t&w=400&h=550" /></a>
					@endforeach
	           	</div>

        	</div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox-ls.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>/ls" id="sendstorenumber"></script>
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
            
			$("#scoreboard").load("/scoreboard.html");


        });
        </script>
    </body>

</html>
