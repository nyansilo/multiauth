<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Full name</th>
                <th>Department</th>
                <th>Title</th>
                <th>Joined</th>
                <th>Action</th>     
            </tr>
        </thead>
        <tbody>

            <?php $request = request(); ?>

            @foreach($users as $user)
            
            <tr>
    
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->department?->name }}</td>
                <td>{{ $user->position }}</td>
              
                <td>
                    <abbr title=""> 
                        {{ $user->created_at }} 
                    </abbr>
                    

                </td>
                <td>
                   
                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.user.destroy', $user->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-outline-info w-30">

                     
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
                <th>Joined</th>
                <th>Action</th>    
                
            </tr>
        </tfoot>
    </table>
</div>