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

        <div class="addForm" id="addGear">
            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value; ?>
            @endforeach

            
           
            
            <h2> Add A New Gear </h2>
            
            {{ Form::open(['action' => 'gear.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}

                 <div class="form-group">
                    
                    {{ Form::label('Sport', 'Choose a Sport: ') }}
                    
                    {{ Form::select('Sport',$sport_options, false, ['class' => 'selectpicker']) }}

                </div>
                

                <div class="form-group">
                    
                    {{ Form::label('GearName', 'Gear Name :') }}
                    {{ Form::input('text', 'GearName', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('GearDescription', 'Description :') }}
                    {{ Form::input( 'text', 'GearDescription', null, ['class' => 'form-control']) }}
                </div>
                <br>


                <div class="form-group dropzone">
                    {{ Form::label('Image', 'Image :') }}
                    {{ Form::file('Image') }}
                </div>
                <br>

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
        <script type="text/javascript">
         
         $(".selectpicker").selectpicker({
            size: 4

         });
         $(".check-mark").hide();
        </script>
        

    </body>


</html>