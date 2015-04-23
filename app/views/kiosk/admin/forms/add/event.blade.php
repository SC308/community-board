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

                 <div class="form-group">
                    
                    {{ Form::label('Sport_name', 'Choose a Sport: ') }}
                    {{ Form::select('Sport_name',$sport_options, false, ['class' => 'selectpicker']) }}
                    

                </div>

                <div class="form-group ">
                    
                    {{ Form::label('Store', 'Choose a Store: ') }}
                    <!-- Use stores array -->
                    @foreach ($store_options as $option)
                    <div class="checkboxOption">
                    {{ Form::radio('Store', $option, false, ['class' => 'form-control']) }}
                    <label for={{$option}}>{{$option}}</label>
                    </div>

                    @endforeach

                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('Event_start', 'Starts At: ') }}
                     <div class="input-group date" id='datetimepicker1'>
                        {{ Form::input('text', 'Event_start', null, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>
                 <div class="form-group ">
                    
                    {{ Form::label('Event_end', 'Ends At: ') }}
                     <div class="input-group date" id='datetimepicker2'>
                        {{ Form::input('text', 'Event_end', null, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>

                

                

                <div class="form-group">
                    
                    {{ Form::label('Title', 'Title :') }}
                    {{ Form::input('text', 'Title', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('Content', 'Description :') }}
                    {{ Form::textarea('Content', null, ['class' => 'form-control']) }}
                </div>
                <br>


                <div class="form-group dropzone">
                    {{ Form::label('Image[]', 'Image(s) :') }}
                    {{ Form::file('Image[]', ['multiple' => 'multiple']) }}
                </div>
                <br>

                <div class="form-group dropzone">
                    {{ Form::label('Video[]', 'Video(s) :') }}
                    {{ Form::file('Video[]', ['multiple' => 'multiple']) }}
                </div>
                <br>
                
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
         $(".selectpicker").selectpicker({
            size: 4

         });
         $(".check-mark").hide();
         
        </script>

    </body>


</html>