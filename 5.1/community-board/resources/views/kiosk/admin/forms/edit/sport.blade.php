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

        <div class="addForm" id="addSport">
            
            @foreach($details as $key =>$value)
                <?php $detail_options[$key] = $value ?>
            @endforeach

            @foreach($months as $month)
                <?php $month_options[$month] = $month ?>
            @endforeach

            <?php $store_options["all"] = "All Stores";?>
            @foreach($stores as $id=>$store)
                <?php $store_options[$id] = $store ?>
            @endforeach
            
            <h2> Edit Sport </h2>
           
            {{ Form::model($sport, ['route' => ['sport.update', Auth::user()->store_id, $sport->id], 'method' => 'PATCH',  'files'=>true])  }}
                
                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                <div class="form-group">
                    {{ Form::label('name', 'Sport Name :') }}
                    {{ Form::text('name', $sport->name, ['class' => 'form-control']) }}
                </div>

                {{ Form::label( 'Active Months :')}}
                <div class="form-group" >
                    {{ Form::label('season_start', ' From :') }}
                    {{ Form::select('season_start',$month_options, $sport->season_start, ['class' => 'selectpicker']) }}
                </div>
                
                <div class="form-group ">
                    {{ Form::label('season_end', ' To :') }}
                    {{ Form::select('season_end', $month_options, $sport->season_end, ['class' => 'selectpicker']) }}
                </div>
                 <div class="form-group ">
                    
                    {{ Form::label('stores[]', 'Which stores should the blog be available in?  ') }}
                    {{ Form::select('stores[]',$store_options, $selected_store ,['class' => 'selectpicker', "multiple"=>"multiple"]) }}


                </div>

                
                <div class="form-group ">
                    {{ Form::label('details[]', 'Choose all applicable detail options: ') }}
                    {{ Form::select('details[]', $detail_options, $selected_details, ['class' => 'selectpicker', "multiple"=>"multiple", "title"=>"Select All Applicable"]) }}
                </div>
                
                
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
         $(".selectpicker").selectpicker();
         
        </script>

    </body>


</html>