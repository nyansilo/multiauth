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

        @foreach ($order->orderItems as $orderItem)
       
            <tr>
                @if($orderItem->id < 9)
                    <td class="no">0{{ $orderItem->id}}</td>
                @else
                    <td class="no">{{ $orderItem->id}}</td>
                @endif

                <td class="text-left">
                    {{ $orderItem->product->title}}
                </td>
             
                <td class="unit text-center">{{ $orderItem->product->unit}}</td>
            
                <td class="total text-center">{{ $orderItem->quantity}}</td>
            </tr>

        @endforeach         
            
    </tbody>
    <tfoot>
        <tr>
            <td class="text-right">Approved By:</td>
            <td class="col-4">

               
            </td>
        
            <td class="text-left">Requested By:</td>
            <td class="text-right"></td>
        </tr>

        <tr>
            <td class="text-right">Postion:</td>
            <td class="text-left">{{ auth()->user()->job_title }}</td>
           
            <td class="text-right">Position</td>
            <td class="text-left">{{ $order->user->job_title }}</td>
        </tr>

        <tr>
            <td class="text-right">Name:</td>
            <td class="text-left">{{ auth()->user()->fullName }}</td>
     
            <td class="text-right">Name:</td>
            <td class="text-left"> {{ $order->user->fullName }}</td>
        </tr>

        <tr>
            <td class="text-right">Signature:</td>
            <td class="text-left">{{ substr(auth()->user()->first_name, 0,1) }}.{{ substr(auth()->user()->last_name,0,1) }}</td>
          
            <td class="text-right">Signature:</td>
            <td class="text-left">{{ substr($order->user->first_name, 0,1) }}.{{ substr($order->user->last_name,0,1) }}</td>
        </tr>

    
    </tfoot>
</table>
