<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Unit</th>
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
                <td>{{ $product->shortName }}</td>

                <td>

                  @if($product->image)

                    <img class="product-img-2"
                    src="{{ $product->imageUrl }}" 
                    alt="{{$product->shortName}}">

                  @else 

                    <img class="product-img-2"
                    src="{{ $product->default_img }}"  
                    alt="{{ $product->shortName }}">
                          
                  @endif

                    

                </td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->unit->name }}</td>
                <td>{{ $product->author->fullName}}</td>
                <td>{{ $product->category?->name }}</td>
              
                <td>
                    <abbr title="{{ $product->dateFormatted(true)}}"> 
                        {{ $product->dateFormatted() }} 
                    </abbr>
                    {!! $product->publicationLabel() !!}

                </td>
                <td>
                   
                    <form  id="category-form"  novalidate="" method="POST" action="{{ route('admin.product.destroy', $product->id)}}">
					
                        @method('DELETE')
                        @csrf
    
                      
                      <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-outline-info w-30">

                     
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
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Author</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>    
                
            </tr>
        </tfoot>
    </table>
</div>