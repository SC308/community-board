<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('css/kiosk/main.css')}}
        {{ HTML::style('css/kiosk/vendor/dropzone/basic.css')}}
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

        <div class="editForm" id="editLocation">
            
            @foreach($sports as $id=>$sport)
                <?php $sport_options[$id] = $sport ?>
            @endforeach
            
            
            <h2> Edit Location </h2>
            
            {{ Form::model($location, ['route' => ['location.update', Auth::user()->store_id, $location->id], 'method' => 'PATCH'])  }}


                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif


                 <div class="form-group">
                    {{ Form::label('sport_id', 'Change the Sport: ') }}
                    {{ Form::select('sport_id',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}
                </div>
            
                <div class="form-group ">
                    {{ Form::label('store_id', 'Change the nearby store: ') }}
                    {{ Form::text('store_id',$store,['readonly']) }}
                </div>

                <div class="form-group">                    
                    {{ Form::label('name', 'Location Name:') }}
                    {{ Form::input('text', 'name', $location->name, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description :') }}
                    {{ Form::textarea('description', $location->description, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('address', 'Address :') }}
                    {{ Form::input('text', 'address', $location->address, ['class' => 'form-control']) }}
                </div>
                
                 <div class="form-group ">
                    {{ Form::label('postal_code', 'Postal Code :') }}
                    {{ Form::input('text', 'postal_code', $location->postal_code, ['class' => 'form-control']) }}
                </div>

                 <div class="form-group ">
                    {{ Form::label('longitude', 'Longitude :') }}
                    {{ Form::input('text', 'longitude', $location->longitude, ['class' => 'form-control', 'readonly' =>'readonly']) }}
                </div>
                
                <div class="form-group ">
                    {{ Form::label('latitude', 'Latitude :') }}
                    {{ Form::input('text', 'latitude', $location->latitude, ['class' => 'form-control', 'readonly' =>'readonly']) }}
                </div>
                <br>
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript" src="/js/kiosk/geolocation.js"></script>
        <script type="text/javascript">
         
         $(".selectpicker").selectpicker();
         
        </script>

    </body>


</html>