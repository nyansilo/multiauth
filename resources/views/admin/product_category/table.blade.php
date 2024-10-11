<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Product Count</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($categories as $category)
            
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->products->count() }}</td>
         
                <td class="sort-name"  width="140">
                   

                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.product_category.destroy', $category->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.product_category.edit', $category->id) }}" class="btn btn-outline-info w-30">

                     
                           <i class="bx bx-pencil me-0"></i>
                           {{--<i class="ti ti-pencil"></i>--}}

                      </a>

                       @if($category->id == config('cms.default_category_id'))
                      
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
                <th>Category Name</th>
                <th>Product Count</th>
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
</div>