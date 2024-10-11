<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>     
            </tr>
        </thead>
        <tbody>

            <?php $request = request(); ?>

            @foreach($products as $product)
            
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->author->first_name }} {{ $product->author->last_name }}</td>
                <td>{{ $product->category?->name }}</td>
              
                <td>
                    <abbr title="{{ $product->dateFormatted(true)}}"> 
                        {{ $product->dateFormatted() }} 
                    </abbr>
                    {!! $product->publicationLabel() !!}

                </td>
                <td>
                   
                    <form  id="category-form"  novalidate="" method="POST" style = "display:inline-block"
                    action="{{ route('admin.product.restore', $product->id)}}">
					
                        @method('PUT')
                        @csrf
                        <button title="Restore" class="btn btn-outline-info w-30" type="submit" >

                            <i class="bx bx-refresh me-0"></i>

                        </button>

                    </form>  
                    
                    <form  id="category-form"  novalidate="" method="POST" style = "display:inline-block"
                    action="{{ route('admin.product.force-destroy', $product->id)}}">
					
                        @method('DELETE')
                        @csrf
                 
                        <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" type="submit" class="btn btn-outline-danger w-30">
                    
                        <i class="bx bx-times me-0"></i>
                        </button>
                
                    </form>      



                  </td>
                
            </tr>
            @endforeach


        </tbody>

        <tfoot>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>    
                
            </tr>
        </tfoot>
    </table>
</div>