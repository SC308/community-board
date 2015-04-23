    <div id= "{{$data->id}}" class="complete-sport">
        
        <div class="complete-heading">
          <label for="name">Sport Name: </label>
          <span class="complete-title" name = "name">
           {{$data->name}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          
          <label for="active_from">Active From: </label>
          <span name = "active_from">
          {{$data->season_start}}
          </span>
          <br>
          
          <label for="active_to">Active To: </label>
          <span name = "active_to">
          {{$data->season_end}}
          </span>
          <br>

          <label for="details">Details: </label>
          <span name = "details">
          @foreach($details as $detail)
            {{$detail}}
          @endforeach
          </span>
          <br>

          @if($data->image != "")
          <?php $image_files = preg_split('/;/', $data->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $image_files as $image_file) 
          <label for= "images">Images:</label>
          <span class="complete-images" name = "images">
            <img src="/images/sport/icons/{{$image_file}}" >
          </span>

          @endforeach
          @endif
                  
        </div>

       

      </div>