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
        
        
    </head>


    <body >
        
        <!-- top bar div -->
        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        <!-- end Top bar div-->

        <div class="addForm" id="addLocation">
            
            @foreach($sports as $id=>$sport)
                <?php $sport_options[$id] = $sport ?>
            @endforeach

            
            @foreach($stores as $id=>$store)
                <?php $store_options[$id] = $store ?>
            @endforeach
            
            <h2> Add Location </h2>
            
            {{ Form::open(['action' => 'location.store'], [ 'class'=> 'form-horizontal ']) }}

                 <div class="form-group">
                    
                    {{ Form::label('Sport_id', 'Select a sport: ') }}
                    {{ Form::select('Sport_id',$sport_options, false ,['class' => 'selectpicker']) }}
                    

                </div>
                
                

                <div class="form-group ">
                    
                    {{ Form::label('Store', 'Select a nearby store: ') }}
                    <!-- Use Details array -->

                    <select class="selectpicker" id="storeSelector" name="Store">
                    @foreach ($store_options as $id => $store)
                         
                          <option value="{{$id}}">{{$store}}</option>
                          
  
                    @endforeach
                    </select>


                </div>

                

                <div class="form-group">
                    
                    {{ Form::label('Title', 'Location Name:') }}
                    {{ Form::input('text', 'Title', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('Description', 'Description :') }}
                    {{ Form::textarea('Description', null, ['class' => 'form-control']) }}
                </div>

                <div id="map-canvas"></div>
                <div class="form-group">
                    {{ Form::label('Address', 'Address :') }}
                    {{ Form::input('text', 'Address', null, ['class' => 'form-control']) }}
                </div>
                
                <br>
                 <div class="form-group ">
                    {{ Form::label('PostalCode', 'Postal Code :') }}
                    {{ Form::input('text', 'PostalCode', null, ['class' => 'form-control']) }}
                </div>
                <br>

                 <div class="form-group ">
                    {{ Form::label('Longitude', 'Longitude :') }}
                    {{ Form::input('text', 'Longitude', null, ['class' => 'form-control']) }}
                </div>
                <br>
                
                <div class="form-group ">
                    {{ Form::label('Latitude', 'Latitude :') }}
                    {{ Form::input('text', 'Latitude', null, ['class' => 'form-control']) }}
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
         
         $(".selectpicker").selectpicker({
            size: 4
         });
         $(".check-mark").hide();
        </script>

    </body>


</html>