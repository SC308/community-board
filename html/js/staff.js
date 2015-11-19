        function extract(a){
          employee = {};
          employee.first     = $(a).attr('data-first')
          employee.position  = $(a).attr('data-position')
          employee.bio       = $(a).attr('data-bio')
          employee.favorite_sport = $(a).attr('data-sport')
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
                var url = '/images/staff/p/'+ random.photo.replace(/\.([a-zA-Z])+$/, "") + '_1080X947.jpg'
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

                // var staff_data =  {{ json_encode($staff) }}
                // var staff_chunks =  {{ json_encode($staff_chunks) }}
                // var counter = {{$chunkCounter}}
                // var totalChunks = {{$chunkCounterMax}}
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

                   if(counter <= totalChunks) {
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
                                    ' data-photo = "'+ staff_chunk[key].photo.replace(/\.([a-zA-Z])+$/, "") +'">'+
                                '<img src="/images/staff/thumb/'+ staff_chunk[key].photo.replace(/\.([a-zA-Z])+$/, "") +'_124X158.jpg" />'+
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