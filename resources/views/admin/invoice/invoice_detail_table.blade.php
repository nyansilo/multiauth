<table border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th class="no">S/No</th>
            <th class="desc">DESCRIPTION OF ITEM(S)</th>
            <th class="unit">UNIT</th>
            <th class="qty">QUANTITY REQUIRED</th>

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

                <td class="desc">
                    {{ $orderItem->product->name}}
                </td>
             
                <td class="unit">{{ $orderItem->product->unit->name}}</td>
            
                <td class="qty">{{ $orderItem->quantity}}</td>
            </tr>

        @endforeach         
            
    </tbody>
  
</table>
