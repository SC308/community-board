        $( document ).ready(function() {

            // var counter = {{$chunkCounter}}
            // var totalChunks = {{$chunkCounterMax}}
            // var photos = {{json_encode($photos)}};
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

               //if(counter <= {{$chunkCounterMax}}) {
                if(counter <= totalChunks) {
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