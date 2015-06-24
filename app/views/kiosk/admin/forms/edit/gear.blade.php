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

        <div class="addForm" id="addGear">
            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value; ?>
            @endforeach

            
           
            
            <h2> Edit Gear </h2>
            
            {{Form::model($gear, ['route' => ['gear.update', Auth::user()->store_id ,$gear->id], 'method' => 'PATCH',  'files'=>true]) }}

                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                 <div class="form-group">
                    
                    {{ Form::label('sport_id', 'Choose a Sport: ') }}
                    {{ Form::select('sport_id',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}

                </div>
                

                <div class="form-group">
                    
                    {{ Form::label('name', 'Gear Name :') }}
                    {{ Form::input('text', 'name', $gear->name, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description :') }}
                    {{ Form::input( 'text', 'description', $gear->description, ['class' => 'form-control']) }}
                </div>
                <br>


                 <!-- remove images from record -->

                @if($gear->image != "")
                    <?php $image_files = preg_split('/;/', $gear->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

                    <div class="form-group">
                        @if(count($image_files) > 0)
                            {{ Form::label ('Uploaded_images', 'Remove Image') }}
                            <br>
                            @foreach( $image_files as $image_file)
                            
                            <!-- Image thumbnails div -->
                            <div class="image-thumbnail-holder">
                                <div>
                                {{ HTML::image("images/kiosk/content/".$image_file , $image_file , ['class' => 'thumb', 'id' => 'image'.$gear->content_id, 'data-remove-image' => 'false']) }}
                                {{ $image_file }}
                                </div>
                                {{ HTML::image("images/kiosk/adminIcons/delete.png", "",['class' => 'hidden remove-image-button'])}}
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
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".selectpicker").selectpicker();
        </script>
        

    </body>


</html>