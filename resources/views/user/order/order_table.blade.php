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
            <td class="col-4"></td>
        
            <td class="text-left">Requested By:</td>
            <td class="text-right"></td>

        </tr>

        <tr>
           
            @if($order->status_message == 'Approved By HOD')
                <!--hod position--> 
                <td class="text-right">Position</td>
                <td class="text-left">{{ $order->approver->position }}</td>
                <!--hod position-->
            @else
                <td class="text-right">Position:</td>
                <td class="text-right">...............</td>
            @endif   
            
            <td class="text-right">Postion:</td>
            <td class="text-left">{{ $order->user->position }}</td>



        </tr>

        <tr>
           
     
            @if($order->status_message == 'Approved By HOD')
                <!--hod fullname--> 
                <td class="text-right">Name:</td>
                <td class="text-left"> {{ $order->approver->fullName }}</td>
                <!--hod fullname-->
            @else
                <td class="text-right">Name:</td>
                <td class="text-right">...............</td>
            @endif

            <td class="text-right">Name:</td>
            <td class="text-left">{{ $order->user->fullName }}</td>
            
        </tr>

        <tr>

            
            @if($order->status_message == 'Approved By HOD')
                <!--hod fullname--> 
                <td class="text-right">Signature:</td>
                <td class="text-left">{{ substr($order->approver->first_name, 0,1) }}.{{ substr($order->approver->last_name,0,1) }}</td>
                
             <!--hod fullname-->
            @else
                <td class="text-right">Signature:</td>
                <td class="text-right">..............</td>
            @endif 

            <td class="text-right">Signature:</td>
            <td class="text-left">{{ substr($order->user->first_name, 0,1) }}.{{ substr($order->user->last_name,0,1) }}</td>
            
        
        </tr>

    
    </tfoot>
</table>
