<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Role Name</th>
                <th>Permissions</th>
                <th>Permissions Count</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($roles as $role)
            
            <tr>
                <td>{{ $role->name }}</td>
                <td> 
                    <?php $links = [] ?>
                    @if ($role->permissions != null)
                        @foreach($role->permissions as $permission)
                            
                                <?php 
                                $links[] = 
                                "<span class=\"badge rounded-pill bg-info text-uppercase ms-2\">"." {$permission->name}</span>"?>
                            
                        @endforeach
                    @endif 
                  {!! implode(' ', $links) !!}
                </td>
                <td> 
                    <span class="badge bg-success">
                        {{ $role->permissions->count() }}
                    </span>
                   
                </td>
         
         
                <td class="sort-name"  width="140">
                   

                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.role.destroy', $role->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                       @if($role->id == config('cms.default_role_id'))
                      
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
                <th>Role Name</th>
                <th>Permissions</th>
                <th>Permissions Count</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
</div>