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
                   
                    <form  id="category-form"  novalidate="" method="POST" style = "display:inline-block"
                    action="{{ route('admin.user.restore', $user->id)}}">
					
                        @method('PUT')
                        @csrf
                        <button title="Restore" class="btn btn-outline-info w-30" type="submit" >

                            <i class="bx bx-refresh me-0"></i>

                        </button>

                    </form>  
                    
                    <form  id="category-form"  novalidate="" method="POST" style = "display:inline-block"
                    action="{{ route('admin.user.force-destroy', $user->id)}}">
					
                        @method('DELETE')
                        @csrf
                 
                        <button title="Delete Permanent" onclick="return confirm('You are about to delete a user permanently. Are you sure?')" type="submit" type="submit" class="btn btn-outline-danger w-30">
                    
                        <i class="bx bx-times me-0"></i>
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