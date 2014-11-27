<?php
//	dd($jumpstart);	
?>
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
			.featurecontent .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
			.featurecontent .active.left {left:0;opacity:0;z-index:2;}
			.featurecontent .next {left:0;opacity:1;z-index:1;}			

            #main{ background-color: #fff;}
            p{ font-size: 20px; line-height: 24px;}
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
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/flyer-int"/><img src="/images/nav-ls-flyer.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/calendar"/><img src="/images/nav-ls-calendar.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/photos"/><img src="/images/nav-ls-photos.jpg" /></a>
                <!-- <a href="/<?php echo $storedetails[0]->store_number ?>/ls/jumpstart"/><img src="/images/nav-ls-jumpstart.jpg" /></a> -->
        	</div>

        	<div id="main">

            <div id="js-info">

                    <img src="/images/jumpstart-logo-white.jpg" id="js-logo" style="margin-right: 50px;" />

                    <div id="js-champ">
                        
                            <img src="/images/jumpstart/js-champ-title.jpg" />    
                        <p>
                            
                            
                            <img src="/timthumb.php?src=/images/jumpstart/champs/{{ $jumpstart[0]->champ_photo }}&w=230&h=230&a=br" align="left" style="margin-right: 20px;" />
                            <strong>{{ $jumpstart[0]->champ_name }}</strong><br />
                            {{ $jumpstart[0]->champ_bio }}
                        </p>
                    </div>
                    
                    <br class="clear" />

                    <img src="/images/jumpstart/js-sport-title.jpg" />
                    <p><img src="/images/jumpstart/photos.jpg" align="right" style="height: 230px; width: auto;" />Sports are an important component in shaping a child’s life, but for 1 in 3 Canadian families, getting 
their kids involved in sports and recreation is simply unaffordable. together we can help all kids 
experience the joy and self-confidence that comes through participating in sports.x</p>
                    <br />
                    <img src="/images/jumpstart/js-what-is-title.jpg" />
                    <p>Jumpstart is a national charitable program that helps financially disadvantaged kids (ages 4 - 18) 
participate in organized sports and recreation across Canada. We give kids a sporting chance 
by covering registration, equipment and/or transportation costs. Our vision at Jumpstart is to help 
build kids self-confidence, self esteem, leadership and direct them towards a better future; 
ultimately we want to fufill the dreams of all Canadian kids. </p>
                    <br />
                    <img src="/images/jumpstart/js-link.jpg" />

            </div>

            <div id="js-sidebar">
                
                <img src="/images/jumpstart/js-together.jpg" style="padding-top: 40px;padding-bottom: 0px; width: 395px; margin: 0 auto; padding-bottom: 140px; padding-left: 35px;" />
               <h1 style="text-align: center; padding-bottom: 20px;"><img src="/images/jumpstart/js-store-total.jpg" style="position: relative; bottom: 5px" />  ${{ number_format($jumpstart[0]->store_raised) }}</h1>

                <!-- <img src="/images/jumpstart/js-store-total.jpg" style="padding-bottom: 20px; width: 400px; margin: 0 auto;" /> -->
                <div id="js-graph" style="width: 500px; height: 389px; margin: 0 auto;">

                    <div id="" style="position: relative; height: 100%; width: 100px; float: left;">
                        
                        <div id="max" style="position: absolute; top: 0; text-align: right !important;">${{ number_format($jumpstart[0]->store_goal) }} &mdash;</div>
                        <div id="min" style="position: absolute; bottom: 10px; text-align: right !important;">$ 0 &mdash;</div>
                        
                    </div>

                    <div id="js-ball" style="position: relative; height: 389px !important; width: 400px !important; float: right;">
                        <div id="fill" style='position: absolute; bottom: 0; background-color: #c00; height: {{ $jsperc }}% !important; width: 100%;'></div>
                        <img src="/images/jumpstart/soccer-ball-lg.png" style="z-index: 100 !important; position: relative; top: 0px;" />
                    </div>
                </div>
                <br />
                

            </div>


                

               





        	</div>


        </div>	


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>/ls" id="sendstorenumber"></script>
        <script> 
        $( document ).ready(function() {
        
        	//document.oncontextmenu = function () { return false; };
        	
			$("#scoreboard").load("/scoreboard.html"); 

        });
        </script>          
    </body>

</html>