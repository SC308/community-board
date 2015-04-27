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

        <div class="addForm" id="addBlog">


            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $id=>$sport)
                <?php $sport_options[$id] = $sport ?>
            @endforeach

            
            <?php $store_options["all"] = "All Stores";?>
            @foreach($stores as $id=>$store)
                <?php $store_options[$id] = $store ?>
            @endforeach
            
            <h2> Add Blog </h2>
            
            {{ Form::open(['action' => 'blog.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}

                @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

               
                 <div class="form-group">
                    
                    {{ Form::label('sport_id', 'What Sport do you want to write about? ') }}
                    {{ Form::select('sport_id',$sport_options, false,['class' => 'selectpicker']) }}
                    

                </div>
                
                <div class="form-group ">
                    
                    {{ Form::label('starts_at', 'When should the blog go live?') }}
                     <div class="input-group date" id='datetimepicker1'>
                        {{ Form::input('text', 'starts_at', null, ['class' => 'form-control']) }}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div> 

                </div>


                <div class="form-group ">
                    
                    {{ Form::label('stores[]', 'Which stores should the blog be available in?  ') }}
                    
                    <select class="selectpicker" multiple = "multiple" id="storeSelector" name="stores[]"  title='Choose all applicable ...'  >
                    @foreach ($store_options as $id => $store)
                         
                          <option value="{{$id}}">{{$store}}</option>
                          
  
                    @endforeach
                    </select>
                    
                </div>

                

                <div class="form-group">
                    
                    {{ Form::label('title', 'Title :') }}
                    {{ Form::input('text', 'title', null, ['class' => 'form-control']) }}

                </div>

                <div class="form-group">
                    {{ Form::label('content', 'Content :') }}
                    {{ Form::textarea('content', null, ['class' => 'form-control']) }}
                </div>
                <br>


                <div class="form-group dropzone">
                    {{ Form::label('image[]', 'Image(s) :') }}
                    {{ Form::file('image[]', ['multiple' => 'multiple']) }}
                </div>
                <br>

                <div class="form-group dropzone">
                    {{ Form::label('video[]', 'Video(s) :') }}
                    {{ Form::file('video[]', ['multiple' => 'multiple']) }}
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
            format: "YYYY-MM-DD HH:mm:ss"
         });
         $(".selectpicker").selectpicker();
         // $(".check-mark").hide();

        </script>

    </body>


</html>