<div class="table-responsive">
    <table  id="example" class="table mb-0">
        <thead class="table-light">
            <tr>
                <th>Order#</th>
                <th>Tracking#</th>
                <th>Full Name</th>
                <th>Status</th>
                <th>Date</th>
                <th>View Details</th>
         
            </tr>
        </thead>
        <tbody>
            @forelse($ordersHOD as $orderItem )
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                          
                            <div class="ms-2">
                                <h6 class="mb-0 font-14">{{ $orderItem->id }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                         
                            <div class="ms-2">
                                <h6 class="mb-0 font-14">{{ $orderItem->tracking_no }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>{{ $orderItem->full_name }}</td>
                    <td>
                        <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                            <i class="bx bxs-circle me-1"></i>
                            {{ $orderItem->status_message }}
                        </div>
                    </td>
        
                    <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                    <td>

        
                        <a  href="{{ route('admin.order.detail.hod', $orderItem->id) }}" type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                    </td>
                
                </tr>
            @empty
                <tr>
                    <td colspan="6"> No Order Item Available</td>
                </tr>    
            @endforelse
        </tbody>
    </table>
</div>