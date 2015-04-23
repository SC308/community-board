    <div id= "{{$data->id}}" class="complete-blog">
        
        <div class="complete-heading">
          <label for="title">Blog Title: </label>
          <span class="complete-title" name = "title">
           {{$data->title}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
           
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->sport_id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->sport_id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          
          <label for= "sport_id">For Sport :</label>
          <span  name = "sport_id">
            {{$sport}}
          </span>
          <br>

          <label for="content">Blog Content: </label>
          <span name = "content">
          {{$data->content}}
          </span>
          <br>
          
          <label for="active_from">Publish Date: </label>
          <span name = "active_from">
          {{$data->date}}
          </span>
          <br>
          
          <label for="author">Author: </label>
          <span name = "author">
          {{$data}}
          {{$data->author_id}}
          </span>
          <br>


          
          <label for= "stores">For Stores :</label>
          @foreach($stores as $store)
            <span  name = "stores">
            {{$store}}
            </span>
          @endforeach

          <br>

          @if($data->images != "")
          <?php $image_files = preg_split('/;/', $data->images, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $image_files as $image_file) 
          <label for= "images">Images:</label>
          <span class="complete-images" name = "images">
            <img src="/images/sport/icons/{{$image_file}}" >
          </span>

          @endforeach
          @endif
          

          @if($data->videos != "")
          <?php $video_files = preg_split('/;/', $data->videos, -1,  PREG_SPLIT_NO_EMPTY); ?>

          @foreach( $video_files as $video_file) 
          <label for= "videos">videos:</label>
          <span class="complete-videos" name = "videos">
            <img src="/videos/sport/icons/{{$video_file}}" >
          </span>

          @endforeach
          @endif
          
                  
        </div>

       

      </div>