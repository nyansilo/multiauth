<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Full name</th>
                <th>Department</th>
                <th>Title</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Action</th>     
            </tr>
        </thead>
        <tbody>

            <?php $request = request(); ?>

            @foreach($admins as $admin)
            
            <tr>
    
                <td>{{ $admin->full_name }}</td>
                <td>{{ $admin->department?->name }}</td>
                <td>{{ $admin->position }}</td>
              
                <td>
                    @if ($admin->roles->isNotEmpty())
                        @foreach ($admin->roles as $role)
                            <span class="badge bg-secondary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    @else
                    
                        <span class="badge bg-primary">
                            No role assigned            
                         </span>  

                    @endif

                </td>

                <td>
                              
                    @if ($admin->permissions->isNotEmpty())
                              
                        @foreach ($admin->permissions as $permission)
                            <span class="badge bg-secondary">
                                {{ $permission->name }}                                    
                            </span>
                        @endforeach
                    @else   
                    
                         <span class="badge bg-primary">
                                No permission assigned            
                          </span> 
                    
                    @endif

                </td>   

                
                <td>
                   
                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.administrator.destroy', $admin->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.administrator.edit', $admin->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                     
                        <button id="delete" type="submit" class="btn btn-outline-danger w-30"> 
                        <i class="bx bx-trash me-0"></i>
                        {{--<i class="ti ti-trash"></i>--}}
                        </button>

                          
                    </form>      



                  </td>
                
            </tr>
            @endforeach


        </tbody>

        <tfoot>
            <tr>
                <th>Full name</th>
                <th>Department</th>
                <th>Title</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>