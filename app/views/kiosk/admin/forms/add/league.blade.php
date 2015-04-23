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

        <div class="addForm" id="addLeague">
            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value; ?>
            @endforeach

            
           
            
            <h2> Add A new League </h2>
            
            {{ Form::open(['action' => 'league.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}

                 <div class="form-group">
                    
                    {{ Form::label('Sport', ' Choose a Sport :') }}
                    <!-- Use Details array -->

                    <select class="selectpicker"  id="sportSelector" name="Sport">
                    @foreach ($sport_options as $id => $sport)
                         
                          <option value="{{$id}}">{{$sport}}</option>
                          
  
                    @endforeach
                    </select>


                </div>

            

                <div class="form-group">
                    
                    {{ Form::label('LeagueName', 'League Name :') }}
                    {{ Form::input('text', 'LeagueName', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('City', 'City :') }}
                    {{ Form::input('text', 'City', $city , ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('Location', 'Location :') }}
                    {{ Form::input('text', 'Location', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('AgeGroup', 'Age Group :') }}
                    {{ Form::input('text', 'AgeGroup', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('Contact', 'Contact Information :') }}
                    {{ Form::input('text', 'Contact', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('Description', 'Description :') }}
                    {{ Form::input('text', 'Description', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('URL', 'Website :') }}
                    {{ Form::input('text', 'URL', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    
                    {{ Form::label('Phone', 'Phone :') }}
                    {{ Form::input('text', 'Phone', null, ['class' => 'form-control phone', 'data-format' => '+1 ddd-ddd-dddd']) }}

                </div>

                
                <div class="form-group dropzone">

                    {{ Form::label('Image', 'Image :') }}
                    {{ Form::file('Image') }}

                </div>
               
                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/moment.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/jquery.inputmask.js"></script> 
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".phone").inputmask("999-999-9999");
         $(".selectpicker").selectpicker({
            size:4
         });
         $(".check-mark").hide();
        </script>

    </body>


</html>