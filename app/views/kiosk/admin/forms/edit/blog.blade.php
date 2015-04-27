<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('/css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('/css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/kiosk/main.css')}}
        {{ HTML::style('css/kiosk/vendor/dropzone/basic.css')}}
        {{ HTML::style('css/kiosk/vendor/bootstrap-datetimepicker.min.css')}}
        {{ HTML::style('css/kiosk/vendor/bootstrap-select.css')}}

    </head>


    <body >
        
        <!-- top bar div -->
        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        <!-- end Top bar div-->

        <div class="editForm" id="editBlog">

            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $id=>$sport)
                <?php $sport_options[$id] = $sport ?>
            @endforeach

            <?php $store_options["all"] = "All Stores";?>
            @foreach($stores as $id=>$store)
                <?php $store_options[$id] = $store ?>
            @endforeach
            
            <h2> Edit Blog </h2>
            
            {{ Form::model($blog, ['route' => ['blog.update', Auth::user()->store_id, $blog->id], 'method' => 'PATCH',  'files'=>true])}}
                 
                 @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif


                 <div class="form-group">
                    
                    {{ Form::label('sport_id', 'Change the sport? ') }}
                    {{ Form::select('sport_id',$sport_options, $selected_sport ,['class' => 'selectpicker']) }}
                    

                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('starts_at', 'Change the Go-live date?') }}
                     <div class="input-group date" id='datetimepicker1'>
                        {{ Form::input('text', 'starts_at', $blog->date, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>


                <div class="form-group ">
                    
                    {{ Form::label('stores[]', 'Which stores should the blog be available in?  ') }}
                    {{ Form::select('stores[]',$store_options, $selected_store ,['class' => 'selectpicker', "multiple"=>"multiple"]) }}


                </div>

                

                <div class="form-group">
                    
                    {{ Form::label('title', 'Change the Title? ') }}
                    {{ Form::input('text', 'title', $blog->title , ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('content', 'Content :') }}
                    {{ Form::textarea('content', $blog->content, ['class' => 'form-control']) }}
                </div>
                <br>
                
                

                <!-- remove images from record -->

                @if($blog->images != "")
                    <?php $image_files = preg_split('/;/', $blog->images, -1,  PREG_SPLIT_NO_EMPTY); ?>

                    <div class="form-group">
                        @if(count($image_files) > 0)
                            {{ Form::label ('Uploaded_images', 'Remove Image(s)') }}
                            <br>
                            @foreach( $image_files as $image_file)
                            
                            <!-- Image thumbnails div -->
                            <div class="image-thumbnail-holder">
                                <div>
                                {{ HTML::image("images/kiosk/content/".$image_file , $image_file , ['class' => 'thumb', 'id' => 'image'.$blog->content_id, 'data-remove-image' => 'false']) }}
                                {{ $image_file }}
                                </div>
                                {{ HTML::image("images/kiosk/adminIcons/edit.png", "",['class' => 'hidden remove-image-button'])}}
                            </div>
                            <!--Image thumbnail div ends -->

                            @endforeach
                        @endif

                        
                    </div>

                    {{ Form::input('text' , 'removeImages', '', ['class' => 'hidden', 'id'=>'removeImages'])  }}

                @endif
                <!-- remove images div end -->


                <!-- add new images div -->
                <div class="form-group dropzone">
                    {{ Form::label('image[]', 'Add more Image(s) :') }}
                    {{ Form::file('image[]', ['multiple' => 'multiple']) }}
                </div>
                <br>

                <!-- add new images div ends -->


                <!-- remove videos from record -->

                @if($blog->videos != "")
                    <?php $video_files = preg_split('/;/', $blog->videos, -1,  PREG_SPLIT_NO_EMPTY); ?>

                    <div class="form-group">
                        @if(count($video_files) > 0)
                            {{ Form::label ('Uploaded_videos', 'Remove Video(s)') }}
                            <br>
                            @foreach( $video_files as $video_file)
                            
                            <!-- Video thumbnails div -->
                            <div class="video-thumbnail-holder">
                                <div>
                                <video class="video-preview" id= {{ "video".$blog["content_id"]}} src="/images/kiosk/content/{{ $video_file}}" data-video-name= {{$video_file}} data-remove-video="false" ></video>
                                {{ $video_file }}
                                </div>
                                {{ HTML::image("images/kiosk/adminIcons/edit.png", "",['class' => 'hidden remove-video-button'])}}
                            </div>
                            <!--Video thumbnail div ends -->

                            @endforeach
                        @endif

                        
                    </div>

                    {{ Form::input('text' , 'removeVideos', '', ['class' => 'hidden', 'id'=>'removeVideos'])  }}

                @endif
                <!-- remove videos div end -->



                <!-- Add new Video div -->
                <div class="form-group dropzone">
                    {{ Form::label('video[]', 'Video(s) :') }}
                    {{ Form::file('video[]', ['multiple' => 'multiple']) }}
                </div>

                 <!-- Add new videos div ends -->
                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/moment.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $('#datetimepicker1').datetimepicker();
         $(".selectpicker").selectpicker();
         
        </script>

    </body>


</html>