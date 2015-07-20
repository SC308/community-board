<!DOCTYPE html>
<html class="no-js">

    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number;?> Photos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>" >
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>" >
        <!-- <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>"> -->
        <link rel="stylesheet" type="text/css" href="/js/lightbox/css/lightbox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

        <style>
        #photos {
          width: 80%;
          margin: auto;
        }

        .smaller{ font-size: 14px; }
        .fancybox{}

        #photos{
            position:relative;
        }
        #photos>.galcolumn {
            float:left;
            display: inline-block;

        }


        </style>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <iframe style="border: 0;display: inline;" id="scoreboard" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip"></iframe>
                <a href="/<?=$storedetails[0]->store_number;?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="photos">
                @foreach($photos[$chunkCounter] as $p)
                    <?php  $filename = pathinfo($p->path)['filename']; ?>
                    <a class="fancybox" data-lightbox = "{{ $p->path }}" href="/images/photos/full/{{ $filename }}_1000.jpg" title="<strong>{{ $p->title}}</strong><br />{{ $p->description}}<?php if ($p->location != "") {echo '<br /><small class=smaller>Location: ' . $p->location . '</small>';}
?><?php if ($p->photographer_name != "") {echo '&nbsp;&nbsp;&nbsp;<small class=smaller>Photographer: ' . $p->photographer_name . '</small>';}
?>"><img src="/images/photos/thumb/{{ $filename }}_300.jpg" /></a>
                @endforeach
            </div>

            @include('includes/nav')


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/jquery.grid-a-licious.js"></script>
        <!-- // <script src="/js/fancybox/source/jquery.fancybox.js"></script> -->
        <script type="text/javascript" src= "/js/lightbox/js/lightbox.js"></script>
        <script type="text/javascript" src= "/js/underscore-1.8.3.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>" id="sendstorenumber"></script>

        <script>


        $( document ).ready(function() {

            var counter = {{$chunkCounter}}
            var totalChunks = {{$chunkCounterMax}}
            var photos = {{json_encode($photos)}};
            var lastScroll = $("#photos").scrollTop();

            var columnHeights = [   $("#photos").children().eq(0).height(),
                                    $("#photos").children().eq(1).height(),
                                    $("#photos").children().eq(2).height()
                                ]

            var photo_urls = new Array();
            var preloadedImages = new Array();

            for (var i = 1 ; i<= totalChunks ; i++)
            {
                var photo_chunk = photos[i];
                for(var key in photo_chunk)
                {
                    if(photo_chunk.hasOwnProperty(key))
                    {
                        imageName = photo_chunk[key].path.replace(/\.([a-zA-Z])+$/, "");
                        var imageObj = new Image(400);

                        imageObj.src = "/images/photos/thumb/"+imageName+"_400.jpg";
                        imageObj.id = photo_chunk[key].id;
                        imageObj.name = imageName;
                        preloadedImages.push(imageObj)
                    }
                }
            }

            document.oncontextmenu = function () { return false; };

            $("#photos").gridalicious({animate: true, gutter: 5, width: 300, selector: '.fancybox'});


            Array.min = function( array ){
                return Math.min.apply( Math, array );
            };

             var bindScroll= function(){
               var newScroll = $("#photos").scrollTop();
               if( newScroll - lastScroll > 100)
               {
                   lastScroll += 1200;
                   $(window).unbind('scroll');
                   loadMore();
               }

            }


            function createPhotoContainer(photo, appendToColumn) {

                    var img = $('<img>');
                    key = _.findWhere(preloadedImages, {id : ""+photo.id})
                    $(img).attr('src', key.src);


                    var aTag = $('<a>');
                    aTag.attr('href', "/images/photos/full/"+ key.name +"_1000.jpg");
                    aTag.attr("data-lightbox", key.name);
                    var title = "<strong>"+ photo.title +"</strong><br />"+ photo.description ;
                    if(photo.location !=  ""){
                        title += "<br><small class=smaller>Location: " + photo.location + "</small>"
                    }
                    if(photo.photographer_name != "" )
                    {
                        title += "&nbsp;&nbsp;&nbsp;<small class=smaller>Photographer: " + photo.photographer_name +"</small>"
                    }
                    aTag.attr('data-title', title);



                    if($(img).prop('complete')){
                        img.appendTo(aTag);

                        var parentNode = $("#photos").children().eq(appendToColumn)
                        aTag.appendTo(parentNode)

                        console.log("image loaded")
                        $(img).fadeIn('fast')
                        return ;


                    }
                    else {
                        console.log("not loaded")
                        return ({"photo": photo, "column": appendToColumn})
                    }



            }



            var loadMore = function()
             {

               if(counter <= {{$chunkCounterMax}}) {
                    counter++;
                }

                var photo_chunk = photos[counter];

                for(var key in photo_chunk){
                    if(photo_chunk.hasOwnProperty(key)){
                        
                        var photo = ( photo_chunk[key])

                        columnHeights = [

                                            $("#photos").children().eq(0).height(),
                                            $("#photos").children().eq(1).height(),
                                            $("#photos").children().eq(2).height()


                                        ]   ;

                        var appendToColumn = (columnHeights.indexOf( Array.min(columnHeights)));

                        var returnValue = createPhotoContainer(photo, appendToColumn )


                        columnHeights = [

                                            $("#photos").children().eq(0).height(),
                                            $("#photos").children().eq(1).height(),
                                            $("#photos").children().eq(2).height()


                                        ]   ;
                    }


                }


               $(window).bind('scroll', bindScroll);
             }

              $("#photos").scroll(bindScroll);



        });
        </script>

    </body>

</html>
