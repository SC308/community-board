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

        <div class="addForm" id="addSport">
            
            <?php $months_options[""] = "Select One"; ?>
            @foreach($months as $key=>$month)
                 <?php $months_options[$month] = $month ?>

            @endforeach

            
            @foreach($details as $key =>$value)
                <?php $detail_options[$key] = $value ?>
            @endforeach
            
        
            
            <h2> Add A New Sport </h2>
            
            {{ Form::open(['action' => 'sport.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}
                <div class="form-group">
                    
                    {{ Form::label('SportName', 'Sport Name :') }}
                    {{ Form::input('text', 'SportName', null, ['class' => 'form-control']) }}

                </div>

                
                
                {{ Form::label( 'Active Months')}}
                <div class="form-group" >
                    {{ Form::label('SeasonStart', 'From :') }}

                    {{ Form::select('SeasonStart',$months_options, false, ['class' => 'selectpicker']) }}     
                </div>
                
                <div class="form-group ">
                    {{ Form::label('SeasonEnd', 'To :') }}

                    {{ Form::select('SeasonEnd',$months_options, false, ['class' => 'selectpicker']) }}
                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('Details[]', 'Choose all applicable detail options: ') }}
                    <!-- Use Details array -->
                    
                    {{ Form::select('Details[]',$detail_options, false, ['class' => 'selectpicker', 'multiple'=>'multiple']) }}


                </div>
                


                <div class="form-group dropzone">
                    {{ Form::label('Image', 'Icon :') }}
                    {{ Form::file('Image') }}
                </div>
                <br>

                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".selectpicker").selectpicker({
            size: 4
         });
         $(".check-mark").hide();
        </script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>

    </body>


</html>