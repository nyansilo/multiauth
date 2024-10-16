<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends BackendController 
{
    public function index()
    {

        $ordersHOD  = Order::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'desc')->get();
        
        $ordersPMU  = Order::where('status_message', 'Approved By HOD')
                            ->orWhere('status_message', 'Approved By PMU')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view("admin.order.index",compact('ordersHOD', 'ordersPMU' ));
        
    }

    public function orderDetailHOD(int $orderId)
    {

        $orderHOD  = Order::where('department_id', Auth::user()->department_id)
                            ->where('id', $orderId)->first();
        if($orderHOD){
            return view('admin.order.order_detail_hod', compact('orderHOD'));
        }else{
                return redirect()->back()->with('message', 'No Order Found');
        } 
            
        
    }


    public function orderDetailPMU(int $orderId)
    {

        $orderPMU  = Order::where('status_message', 'Approved By HOD')
                            ->orWhere('status_message', 'Approved By PMU')
                            ->where('id', $orderId)
                            ->first();

        if($orderPMU){
            return view('admin.order.order_detail_pmu', compact('orderPMU'));
        }else{
                return redirect()->back()->with('message', 'No Order Found');
        } 
            
        
    }

    public function orderUpdateHOD(int $orderId, Request $request)
    {

        $orderHOD  = Order::where('department_id', Auth::user()->department_id)
                            ->where('id', $orderId)
                            ->first();
        if($orderHOD){

            //dd($request->approverSign);

            $orderHOD->update([
                
                'approver_id'    => $request->approverId,
                'approver_sign'  => $request->approverSign,
                'status_message' => $request->orderStatus,
            ]);

            //return redirect()->back()->with('message', 'Order Status Updated');
            return redirect()->route('admin.order.detail.hod', $orderId)->with('message', 'Order Status Updated');
           
        }else{

            return redirect()->route('admin.order.detail.hod', $orderId)->with('message','Order Id not  Found');
            //return redirect()->back()->with('message', 'No Order Found');
        }   
        
    }

    public function orderUpdatePMU(int $orderId, Request $request)
    {

        $orderPMU  = Order::where('status_message', 'Approved By HOD')
                            ->where('id', $orderId)
                            ->first();
   
        if($orderPMU){

            $orderPMU->update([
                'status_message' => $request->orderStatus
            ]);

            //return redirect()->back()->with('message', 'Order Status Updated');
            return redirect()->route('admin.order.detail.pmu', $orderId)->with('message', 'Order Status Updated');
           
        }else{

            return redirect()->route('admin.order.detail.pmu', $orderId)->with('message','Order Id not  Found');
            //return redirect()->back()->with('message', 'No Order Found');
        }   
        
    }

    public function viewInvoice(int $orderId){

        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate_invoice', compact('order'));
    }

    public function generateInvoice(int $orderId){

        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $todayDate = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.generate_invoice', $data);
        return $pdf->download('requestion-'.$order->id. '-'. $todayDate.'.pdf');
   ;

        
    }

}
