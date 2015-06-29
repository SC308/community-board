<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number;?> Staff</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <iframe style="border: 0;display: inline;" id="scoreboard" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip"></iframe>
                <a href="/<?=$storedetails[0]->store_number;?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="staff">
                <div id="current-staff">
                    <div id="current-staff-bio">

                        <div id="bio">
                        <div id="store-ribbon">
                            <?=$storedetails[0]->store_name;?>
                        </div>
                                <span class="whiteboxtop"></span><h1 class="name"></h1>
                                <span class="whitebox"></span><h2 class="dept"></h2>
                                <p class="bio-text">

                                </p>


                                <p class="sports">
                                    <i class="icon-heart"></i>&nbsp;&nbsp;Sport: <span class="favsport"></span>
                                </p>



                        </div>


                    </div>
<!--                     <div id="arrows"></div> -->
                    <div id="bio-nav" style="overflow: scroll;">

                        @foreach($staff_chunks[$chunkCounter] as $s)
                            <a href="javascript:void(0)" onclick="javascript:extract(this);" data-first= "{{$s->first}}" data-position = "{{$s->position}}" data-bio =  "{{$s->bio}}" data-sport = "{{$s->favorite_sport}}" data-photo = "{{$s->photo}}">
                                <img src="/timthumb.php?src=/images/staff/{{ $s->photo }}&w=124&h=158&a=br" />
                            </a>
                        @endforeach

                    </div>

                </div>




            </div>


        @include('includes/nav')

        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>" id="sendstorenumber"></script>
<!--         <script src="js/jquery.mobile-1.3.2.min.js"></script> -->

        <script type="text/javascript">




        function extract(a){
          employee = {};
          employee.first     = $(a).attr('data-first')
          employee.position  = $(a).attr('data-position')
          employee.bio       = $(a).attr('data-bio')
          employee.favorite_sport    = $(a).attr('data-sport')
          employee.photo     = $(a).attr('data-photo')

          show(employee)
        }

		function show( random ){
            resetTimer();

            $("#bio").css("opacity", "0");
            $("#current-staff-bio").css("opacity", "0");

                $(".name").replaceWith('<h1 class="name">'+ random.first +'</h1>');
                $(".dept").replaceWith('<h2 class="dept">'+ random.position +'</h2>');
                $(".bio-text").replaceWith('<p class="bio-text">'+ random.bio +'</p>');
                $(".favsport").replaceWith('<span class="favsport">'+ random.favorite_sport +'</span>');
                var url = '/timthumb.php?src=/images/staff/'+ random.photo + '&w=1080&h=947'
                $("#current-staff-bio").css("background", "transparent url(" + url + ") top center no-repeat");

            $( "#bio" ).animate({
                opacity: 1.0,
                }, 1000, function() {
            });

            $( "#current-staff-bio" ).animate({
                opacity: 1.0
                }, 1000, function() {
            });

        }
        $(document).ready(function(){

                var staff_data =  {{ json_encode($staff) }}
                var staff_chunks =  {{ json_encode($staff_chunks) }}
                var counter = {{$chunkCounter}}
                var totalChunks = {{$chunkCounterMax}}
                var lastScroll = $("#bio-nav").scrollTop();
                var columnCounter = 0;

                document.oncontextmenu = function () { return false; };

                var random = staff_data[Math.floor(Math.random()*staff_data.length)];
                show(random);
                $('a').click(function (e) {
                    if ($(':animated').length) {
                        return false;
                    }
                });

                $( "#bio-nav" ).on( "swipeleft", swipeHandler );
                $( "#bio-nav" ).on( "swiperight", swipeHandler );

                function swipeHandler( event ){
                    $("#arrows").fadeOut("fast");
                }


                 $("#bio-nav").scroll(bindScroll);

                 var loadMore = function()
                 {

                   if(counter <= {{$chunkCounterMax}}) {
                        counter++;
                    }

                    var staff_chunk = staff_chunks[counter];
                    for(var key in staff_chunk){
                        if(staff_chunk.hasOwnProperty(key)){
                            console.log(staff_chunk[key])
                            $("#bio-nav").append(
                                '<a href="javascript:void(0)" onclick="javascript:extract(this);"'+
                                    ' data-first= "'+ staff_chunk[key].first +'"'+
                                    ' data-position = "'+ staff_chunk[key].position +'"'+
                                    ' data-bio =  "'+ staff_chunk[key].bio +'"'+
                                    ' data-sport = "'+ staff_chunk[key].favorite_sport +'"'+
                                    ' data-photo = "'+ staff_chunk[key].photo +'">'+
                                '<img src="/timthumb.php?src=/images/staff/'+ staff_chunk[key].photo +'&w=124&h=158&a=br" />'+
                                '</a> '
                                )

                        }
                    }


                   $(window).bind('scroll', bindScroll);
                 }

                function bindScroll(){
                   var newScroll = $("#bio-nav").scrollTop();
                   if( newScroll - lastScroll >3)
                   {
                       lastScroll += 550;
                       $(window).unbind('scroll');
                       loadMore();
                   }

                }

        });



        </script>


    </body>

</html>
