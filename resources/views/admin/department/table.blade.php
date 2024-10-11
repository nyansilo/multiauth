<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Members Count</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($departments as $department)
            
            <tr>
                <td>{{ $department->name }}</td>
                <td>{{ $department->users->count() }}</td>
         
                <td class="sort-name"  width="140">
                   

                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.department.destroy', $department->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.department.edit', $department->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                       @if($department->id == config('cms.default_department_id'))
                      
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
                <th>Department Name</th>
                <th>Members Count</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
</div>