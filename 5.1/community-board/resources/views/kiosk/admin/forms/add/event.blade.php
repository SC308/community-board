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

        <div class="addForm" id="addEvent">
            
            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value ?>
            @endforeach

            
            @foreach($stores as $key =>$value)
                <?php $store_options[$key] = $value ?>
            @endforeach
            
            <h2> Add An Event </h2>
            
            {{ Form::open(['action' => 'event.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}

                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                 <div class="form-group">
                    
                    {{ Form::label('sport_id', 'Choose a Sport: ') }}
                    {{ Form::select('sport_id',$sport_options, false, ['class' => 'selectpicker']) }}
                    

                </div>

                <div class="form-group ">
                    
                    {{ Form::label('store', 'Choose a Store: ') }}
                    {{Form::text('store', $store_options[$store], ['readonly'=>'readonly'])}}
                   
                   

                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('event_start', 'Starts At: ') }}
                     <div class="input-group date" id='datetimepicker1'>
                        {{ Form::input('text', 'event_start', null, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>
                 <div class="form-group ">
                    
                    {{ Form::label('event_end', 'Ends At: ') }}
                     <div class="input-group date" id='datetimepicker2'>
                        {{ Form::input('text', 'event_end', null, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>

                

                

                <div class="form-group">
                    
                    {{ Form::label('title', 'Title :') }}
                    {{ Form::input('text', 'title', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description :') }}
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
               
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
         $('#datetimepicker1').datetimepicker({
            format : 'YYYY-MM-DD HH:mm:ss'
         });
         $('#datetimepicker2').datetimepicker({
            format : 'YYYY-MM-DD HH:mm:ss'
         });
         $(".selectpicker").selectpicker();
         
        </script>

    </body>


</html>