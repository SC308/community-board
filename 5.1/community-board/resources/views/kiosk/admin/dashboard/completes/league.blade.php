    <div id= "{{$data->id}}" class="complete-league">
        
        <div class="complete-heading">
          <label for="name">league Name: </label>
          <span class="complete-title" name = "name">
           {{$data->name}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          <label for="city">City: </label>
          <span name = "city">
          {{$data->city}}
          </span>
          <br>
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
          <label for="location">Location: </label>
          <span name = "location">
          {{$data->location}}
          </span>
          <br>
          <label for="ages">Ages: </label>
          <span name = "ages">
          {{$data->ages}}
          </span>
          <br>
          <label for="location">Location: </label>
          <span name = "location">
          {{$data->location}}
          </span>
          <br>
          <label for="contact">Contact: </label>
          <span name = "contact">
          {{$data->contact}}
          </span>
          <br>
          <label for="url">URL: </label>
          <span name = "url">
          {{$data->url}}
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
                  
        </div>

       

      </div>