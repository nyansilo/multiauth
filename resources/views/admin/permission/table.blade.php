<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Permission Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($permissions as $permission)
            
            <tr>
                <td>{{ $permission->name }}</td>
               
                <td> 
                    <span class="badge bg-success">
                        {{ $permission->display_name }}
                    </span>
                   
                </td>

                <td>{{ $permission->description }}</td>
         
         
                <td class="sort-name"  width="140">
                   

                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.permission.destroy', $permission->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                       @if($permission->id == config('cms.default_permission_id'))
                      
                              <button onclick="return false"type="submit" class="btn btn-outline-danger w-30" > 
                                <i class="bx bx-x-circle me-0"></i>
                              </button> 

                         @else

                              <button id="delete" type="submit" class="btn btn-outline-danger w-30"> 
                                <i class="bx bx-trash me-0"></i>
                                {{--<i class="ti ti-trash"></i>--}}
                              </button>

                           @endif    
                    </form>      



                  </td>
                
            </tr>
            @endforeach


        </tbody>



        <tfoot>
            <tr>
                <th>Permission Name</th>
                <th>Display Name</th>
                <th>Description</th>
                <th>Action</th>>
      
                
            </tr>
        </tfoot>
    </table>
</div>