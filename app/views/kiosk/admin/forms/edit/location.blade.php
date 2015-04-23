<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('css/kiosk/main.css')}}
        {{ HTML::style('css/kiosk/vendor/dropzone/basic.css')}}
        
        
        
    </head>


    <body >
        
        <!-- top bar div -->
        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        <!-- end Top bar div-->

        <div class="editForm" id="editLocation">
            
            <?php $sport_options[""] = "Select" ?>
            @foreach($sports as $id=>$sport)
                <?php $sport_options[$id] = $sport ?>
            @endforeach


            <?php $store_options[""] = "Select" ?>
            @foreach($stores as $id=>$store)
                <?php $store_options[$id] = $store ?>
            @endforeach
            
            
            <h2> Add Location </h2>
            
            {{ Form::model($location, ['route' => ['location.update', Auth::user()->store_id, $location->id], 'method' => 'PATCH'])  }}

                 <div class="form-group">
                    
                    {{ Form::label('Sport', 'Change the Sport: ') }}
                    {{ Form::select('Sport',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}
                    

                </div>
                
                

                <div class="form-group ">
                    
                    {{ Form::label('Store', 'Change the nearby store: ') }}
                    <!-- Use Details array -->
                    {{ Form::select('Store',$store_options, $selected_store ,['class' => 'selectpicker']) }}
                    


                </div>

                

                <div class="form-group">
                    
                    {{ Form::label('Title', 'Location Name:') }}
                    {{ Form::input('text', 'Title', $location->name, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('Description', 'Description :') }}
                    {{ Form::textarea('Description', $location->description, ['class' => 'form-control']) }}
                </div>

                <div id="map-canvas"></div>
                <div class="form-group">
                    {{ Form::label('Address', 'Address :') }}
                    {{ Form::input('text', 'Address', $location->address, ['class' => 'form-control']) }}
                </div>
                
                <br>
                 <div class="form-group ">
                    {{ Form::label('PostalCode', 'Postal Code :') }}
                    {{ Form::input('text', 'PostalCode', $location->postal_code, ['class' => 'form-control']) }}
                </div>
                <br>

                 <div class="form-group ">
                    {{ Form::label('Longitude', 'Longitude :') }}
                    {{ Form::input('text', 'Longitude', $location->longitude, ['class' => 'form-control', 'readonly' =>'readonly']) }}
                </div>
                <br>
                
                <div class="form-group ">
                    {{ Form::label('Latitude', 'Latitude :') }}
                    {{ Form::input('text', 'Latitude', $location->latitude, ['class' => 'form-control', 'readonly' =>'readonly']) }}
                </div>
                <br>
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script type="text/javascript" src="/js/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap-select.js"></script>
        <script type="text/javascript" src="/js/geolocation.js"></script>
        <script type="text/javascript">
         
         $(".selectpicker").selectpicker({
            size: 4
         });
         $(".check-mark").hide();
        </script>

    </body>


</html>