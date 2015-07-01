    <div id= "{{$data->id}}" class="complete-location">
        
        <div class="complete-heading">
          <label for="name">Location Name: </label>
          <span class="complete-title" name = "name">
           {{$data->name}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            
            
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
          <label for="store">Nearest Store: </label>
          <span name = "store">
          {{$store}}
          </span>
          <br>
          <label for="Address"> Address: </label>
          <span name = "Address">
          {{$data->address}}
          </span>
          <br>
          <label for="PostalCode"> Postal Code: </label>
          <span name = "PostalCode">
          {{$data->postal_code}}
          </span>
                  
        </div>

       

      </div>
      
      