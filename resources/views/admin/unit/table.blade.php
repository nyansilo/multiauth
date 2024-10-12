<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Unit Name</th>
                <th>Product Count</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($units as $unit)
            
            <tr>
                <td>{{ $unit->name }}</td>
                <td>{{ $unit->products->count() }}</td>
         
                <td class="sort-name"  width="140">
                   

                    <form  id="unit-form"  novalidate="" method="POST" action="{{ route('admin.unit.destroy', $unit->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.unit.edit', $unit->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                       @if($unit->id == config('cms.default_unit_id'))
                      
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
                <th>Unit Name</th>
                <th>Product Count</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
</div>