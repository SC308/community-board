<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number;?> Flyer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>


    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
                <iframe style="border: 0;display: inline;" id="scoreboard" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip?timezone_offset={{ $storedetails[0]->timezone_offset }}"></iframe>
                <a href="/<?=$storedetails[0]->store_number;?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="flyer">

                @foreach($flyer as $f)
                    <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
                    <a class="fancybox" href="/images/flyer/full/{{$filename}}_1000.jpg"><img src="/images/flyer/thumb/thumb/{{$filename}}_343X400.jpg" /></a>
                @endforeach

           </div>


            @include('includes/nav')

        </div>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/fancybox/source/jquery.fancybox.js"></script>

		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>" id="sendstorenumber"></script>
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
