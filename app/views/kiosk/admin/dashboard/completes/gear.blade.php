    <div id= "{{$data->id}}" class="complete-gear">
        
        <div class="complete-heading">
          <label for="name">Gear Name: </label>
          <span class="complete-title" name = "name">
           {{$data->name}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          
          <label for="sport">Sport: </label>
          <span name = "sport">
          {{$sport}}
          </span>
          <br>
          <label for="description">Description: </label>
          <span name = "description">
          {{$data->description}}
          </span>
          <br>
          

          @if($data->image != "")
          <?php $image_files = preg_split('/;/', $data->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $image_files as $image_file) 
          <label for= "images">Images:</label>
          <span class="complete-images" name = "Images_images">
            <img src="/images/kiosk/content/{{$image_file}}" >
          </span>

          @endforeach
          @endif




          @if($data->image != "")
          <?php $image_files = preg_split('/;/', $data->league_image, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $image_files as $image_file) 
          <label for= "sport_images">Images:</label>
          <span class="complete-images" name = "sport_images">
            <img src="/images/sport/icons/{{$image_file}}" >
          </span>

          @endforeach
          @endif
                  
        </div>

       

      </div>