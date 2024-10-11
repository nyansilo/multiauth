<table>
    <thead>
        <tr>
            <th>S/No</th>
            <th class="text-left">DESCRIPTION OF ITEM(S)</th>
            <th class="text-center">UNIT</th>
            <th class="text-center">QUANTITY REQUIRED</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($orderHOD->orderItems as $orderItem)
       
            <tr>
                @if($orderItem->id < 9)
                    <td class="no">0{{ $orderItem->id}}</td>
                @else
                    <td class="no">{{ $orderItem->id}}</td>
                @endif

                <td class="text-left">
                    {{ $orderItem->product->name}}
                </td>
             
                <td class="unit text-center">{{ $orderItem->product->unit->name}}</td>
            
                <td class="total text-center">{{ $orderItem->quantity}}</td>
            </tr>

        @endforeach         
            
    </tbody>
    <tfoot>
        <tr>
            <td class="text-right">Approved By:</td>
            <td class="col-4">

                <form 
                   
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <select name="orderStatus" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected="">Please Choose</option>
                            <option value="Approved By HOD" {{ Request::get('orderStatus') == 'Approved By HOD' ? 'selected' : ''}}>Approved By HOD</option>
                            <option value="Approved By PMU" {{ Request::get('orderStatus') == 'Approved By PMU' ? 'selected' : ''}}>Approved By PMU</option> 
                    
                        </select>
                        <input type="hidden" name="approverId"  value="{{ auth()->user()->id }}" />
                        <input type="hidden" name="approverSign"  value="{{ substr(auth()->user()->first_name, 0,1) }}.{{ substr(auth()->user()->last_name,0,1) }}" />
                        <button class="btn btn-outline-primary" type="submit">Approve</button>
                    </div>
                </form>

            </td>
        
            <td class="text-left">Requested By:</td>
            <td class="text-right"></td>
        </tr>

        <tr>
            <td class="text-right">Postion:</td>
            <td class="text-left">{{ auth()->user()->position }}</td>
           
            <td class="text-right">Position</td>
            <td class="text-left">{{ $orderHOD->user->position }}</td>
        </tr>

        <tr>
            <td class="text-right">Name:</td>
            <td class="text-left">{{ auth()->user()->fullName }}</td>
     
            <td class="text-right">Name:</td>
            <td class="text-left"> {{ $orderHOD->user->fullName }}</td>
        </tr>

        <tr>
            <td class="text-right">Signature:</td>
            <td class="text-left">{{ substr(auth()->user()->first_name, 0,1) }}.{{ substr(auth()->user()->last_name,0,1) }}</td>
          
            <td class="text-right">Signature:</td>
            <td class="text-left">{{ substr($orderHOD->user->first_name, 0,1) }}.{{ substr($orderHOD->user->last_name,0,1) }}</td>
        </tr>

    
    </tfoot>
</table>
