<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('css/kiosk/main.css')}}
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

        <div class="addForm" id="addLeague">
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value; ?>
            @endforeach

            
           
            
            <h2> Edit League </h2>
            
            {{ Form::model($league, ['route' => ['league.update', Auth::user()->store_id , $league->id], 'method' => 'PATCH',  'files'=>true])  }}

                 @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif


                 <div class="form-group">
                    
                    {{ Form::label('sport_id', ' Choose a Sport :') }}
                    <!-- Use Details array -->
                    {{ Form::select('sport_id',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}
                    


                </div>


                <div class="form-group">
                    
                    {{ Form::label('name', 'League Name :') }}
                    {{ Form::input('text', 'name', $league->name, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('city', 'City :') }}
                    {{ Form::input('text', 'city', $league->city, ['class' => 'form-control', 'readonly']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('location', 'Location :') }}
                    {{ Form::input('text', 'location', $league->location, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('age_group', 'Age Group :') }}
                    {{ Form::input('text', 'age_group', $league->ages, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('contact', 'Contact Information :') }}
                    {{ Form::input('text', 'contact', $league->contact, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('description', 'Description :') }}
                    {{ Form::input('text', 'description', $league->description, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('url', 'Website :') }}
                    {{ Form::input('text', 'url', $league->url , ['class' => 'form-control']) }}

                </div>

                

                
                 <!-- remove images from record -->

                @if($league->image != "")
                    <?php $image_files = preg_split('/;/', $league->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

                    <div class="form-group">
                        @if(count($image_files) > 0)
                            {{ Form::label ('Uploaded_images', 'Remove Image') }}
                            <br>
                            @foreach( $image_files as $image_file)
                            
                            <!-- Image thumbnails div -->
                            <div class="image-thumbnail-holder">
                                <div>
                                {{ HTML::image("images/kiosk/content/".$image_file , $image_file , ['class' => 'thumb', 'id' => 'image'.$league->content_id, 'data-remove-image' => 'false']) }}
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
                    {{ Form::label('image', 'Add more Image :') }}
                    {{ Form::file('image') }}
                </div>
                <br>

                <!-- add new images div ends -->
               
                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/moment.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript">
         $('#datetimepicker1').datetimepicker();
         $('#datetimepicker2').datetimepicker();
         
        </script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".selectpicker").selectpicker();
        </script>

    </body>


</html>