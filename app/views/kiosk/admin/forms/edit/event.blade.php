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

        <div class="addForm" id="editEvent">
            


            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value ?>
            @endforeach

            
            @foreach($stores as $key =>$value)
                <?php $store_options[$key] = $value ?>
            @endforeach
            
            <h2> Edit Event </h2>
            
            {{ Form::model($event, ['route' => ['event.update', Auth::user()->store_id, $event->id], 'method' => 'PATCH']) }}

                 <div class="form-group">
                    
                    {{ Form::label('Sport_name', 'Choose a Sport: ') }}
                    {{ Form::select('Sport_name',$sport_options, $selected_sport, ['class' => 'selectpicker']) }}

                </div>

                <div class="form-group ">
                    
                    {{ Form::label('Store', 'Choose a Store: ') }}
                    {{ Form::select('Store',$store_options, $selected_store, ['class' => 'selectpicker']) }}
                    

                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('Event_start', 'Starts At: ') }}
                     <div class="input-group date" id='datetimepicker1'>
                        {{ Form::input('text', 'Event_start', $event->event_start, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>
                 <div class="form-group ">
                    
                    {{ Form::label('Event_end', 'Ends At: ') }}
                     <div class="input-group date" id='datetimepicker2'>
                        {{ Form::input('text', 'Event_end', $event->event_end, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>

                
                

                <div class="form-group">
                    
                    {{ Form::label('Title', 'Title :') }}
                    {{ Form::input('text', 'Title', $event->title, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('Content', 'Description :') }}
                    {{ Form::textarea('Content', $event->description, ['class' => 'form-control']) }}
                </div>
                <br>
                
                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for event ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/vendor/moment.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script type="text/javascript" src="/js/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
        $(".selectpicker").selectpicker({
            size:4
         });
         $('#datetimepicker1').datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss"
         });
         $('#datetimepicker2').datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss"
         });
         
         $(".check-mark").hide();
        </script>

    </body>


</html>