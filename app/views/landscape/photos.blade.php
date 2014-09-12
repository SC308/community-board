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
             
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

        	<div id="nav">
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/staff"/><img src="/images/nav-ls-staff.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/flyer-int"/><img src="/images/nav-ls-flyer.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/calendar"/><img src="/images/nav-ls-calendar.jpg" /></a>
        		<!-- <a href="/<?php echo $storedetails[0]->store_number ?>/ls/photos"/><img src="/images/nav-ls-photos.jpg" /></a> -->
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls/jumpstart"/><img src="/images/nav-ls-jumpstart.jpg" /></a>
        	</div>

        	<div id="main" class="photos">
        		
            @foreach($photos as $p)

	            <a class="fancybox" href="/timthumb.php?src=/images/photos/{{ $p->path }}&w=1000.jpg" title="<strong>{{ $p->title}}</strong><br />{{ $p->description}}<?php if($p->location !=""){ echo '<br /><small class=smaller>Location: '.$p->location . '</small>'; } ?><?php if($p->photographer_name !=""){ echo '&nbsp;&nbsp;&nbsp;<small class=smaller>Photographer: '.$p->photographer_name . '</small>'; } ?>"><img src="/timthumb.php?src=/images/photos/{{ $p->path }}&w=300" /></a>

            @endforeach

        	</div>


        </div>	


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox-ls.js"></script>


        <script> 
        $( document ).ready(function() {
        
        	//document.oncontextmenu = function () { return false; };
        	
			//$("#scoreboard").load("/scoreboard.html"); 
			$(".photos").gridalicious({animate: true, gutter: 5, width: 300, selector: '.fancybox'});

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