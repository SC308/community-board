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

                 <div class="form-group">
                    
                    {{ Form::label('Sport', 'Choose a Sport: ') }}
                    {{ Form::select('Sport',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}

                </div>
                

                <div class="form-group">
                    
                    {{ Form::label('GearName', 'Gear Name :') }}
                    {{ Form::input('text', 'GearName', $gear->name, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('GearDescription', 'Description :') }}
                    {{ Form::input( 'text', 'GearDescription', $gear->description, ['class' => 'form-control']) }}
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
                                {{ HTML::image("images/content/".$image_file , $image_file , ['class' => 'thumb', 'id' => 'image'.$gear->content_id, 'data-remove-image' => 'false']) }}
                                {{ $image_file }}
                                </div>
                                {{ HTML::image("images/edit.png", "",['class' => 'hidden remove-image-button'])}}
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
                    {{ Form::label('Image', 'Add more Image :') }}
                    {{ Form::file('Image') }}
                </div>
                <br>

                <!-- add new images div ends -->

                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script type="text/javascript" src="/js/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".selectpicker").selectpicker();
         $(".check-mark").hide();
        </script>
        

    </body>


</html>