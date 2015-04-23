    <div id= "{{$data->store_id}}" class="complete-store">
        
        <div class="complete-heading">
          <label for="store_name">Store Name: </label>
          <span class="complete-title" name = "store_name">
           {{$data->store_name}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->store_id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->store_id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          
          

          <label for="store_number">Store Number: </label>
          <span name = "store_number">
          {{$data->store_number}}
          </span>
          <br>
          <label for="address">Address : </label>
          <span name = "address">
          {{$data->address}}
          </span>
          <br>
          <label for="city">City : </label>
          <span name = "city">
          {{$data->city}}
          </span>
          <br>
          <label for="prov">Province : </label>
          <span name = "prov">
          {{$data->prov}}
          </span>
          <br>


          @if($data->store_image != "")
          <?php $image_files = preg_split('/;/', $data->store_image, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $image_files as $image_file) 
          <label for= "store_images">Images:</label>
          <span class="complete-images" name = "store_images">
            <img src="/images/store/icons/{{$image_file}}" >
          </span>

          @endforeach
          @endif
                  
        </div>

       

      </div>