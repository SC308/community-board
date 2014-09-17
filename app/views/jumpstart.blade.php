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
        
        <style>
        #jumpstart {
          width: 80%;
          margin: auto;
        }
        


        </style>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/<?=$storedetails[0]->store_number?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>


            
            <div id="jumpstart">
            	

            </div>



             <div id="nav" class="fullwidth">
<!--                 <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/flyer-int"><img src="/images/nav-flyer.png" /></a> -->
                <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/jumpstart"><img src="/images/nav-js-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-cal-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos-sm.jpg" /></a>                
            </div>
        

        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/jquery.grid-a-licious.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>
        


        <script> 
          
			
        $( document ).ready(function() {
        	
        	document.oncontextmenu = function () { return false; };
        
            $("#scoreboard").load("/scoreboard.html"); 
            
 
        });
        </script>         

    </body>

</html>