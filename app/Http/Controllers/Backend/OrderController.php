<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function allOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $allOrders = Order::with('orderdetalis')->get();
                // dd($allOrders);
                return view('backend.admin.orders.allorders', compact('allOrders'));
            }
        } 
    }

    public function todayOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $todayDate = Carbon::today();
                $todayOrders = Order::with('orderdetalis')->whereDate('created_at', $todayDate)->get();
                // dd($allOrders);
                return view('backend.admin.orders.todayorders', compact('todayOrders'));
            }
        } 
    }

    public function pendingOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $pendingOrders = Order::with('orderdetalis')->where('status','pending')->get();
                // dd($allOrders);
                return view('backend.admin.orders.pendingorders', compact('pendingOrders'));
            }
        } 
    }

    public function confirmedOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $confirmedOrders = Order::with('orderdetalis')->where('status','confirmed')->get();
                // dd($allOrders);
                return view('backend.admin.orders.confirmedorders', compact('confirmedOrders'));
            }
        } 
    }

    
    public function deliveredOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $deliveredOrders = Order::with('orderdetalis')->where('status','delivered')->get();
                // dd($allOrders);
                return view('backend.admin.orders.deliveredorders', compact('deliveredOrders'));
            }
        } 
    }

    public function cancelledOrders ()
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $cancelledOrders = Order::with('orderdetalis')->where('status','cancelled')->get();
                // dd($allOrders);
                return view('backend.admin.orders.cancelledOrders', compact('cancelledOrders'));
            }
        } 
    }

    public function statusCancelled ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $order = Order::find($id);
                $order->status = 'cancelled';

                $order->save();
                toastr()->success('Order has been cancelled');
                return redirect()->back();
            }
       }  
    }
    public function statusConfirmed ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $order = Order::find($id);
                $order->status = 'confirmed';

                $order->save();
                toastr()->success('Order has been confirmed');
                return redirect()->back();
            }
       }  
    }

   public function statusDelivered ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $order = Order::find($id);
                if($order->courier_name != null){
                    $order->status = 'delivered';

                    if($order->courier_name == "steadfast"){
                        $endPoint = "https://portal.packzy.com/api/v1/create_order";

                        //Authentication Parametre...
                        $apikey = "0bfrcaae6yhqciwudprj2lspikyqzfrf";
                        $secretkey = "zoisarcytmloahq8bs9tmpyj";

                        //The Body Parameters...
                        $invoice = $order->invoiceId;
                        $customerName = $order->c_name;
                        $customerPhone = $order->c_phone;
                        $customerAddress = $order->address;
                        $price = $order->price;

                        //The Header...
                        $header = [
                            'Api-key' => $apikey,
                            'Secret-Key' => $secretkey,
                            'Content-Type' => 'application/json',
                        ];

                        //The Payload...
                        $payload = [
                            'invoice' => $invoice,
                            'recipient_name' => $customerName,
                            'recipient_phone' => $customerPhone,
                            'recipient_address' => $customerAddress,
                            'cod_amount' => $price
                            
                        ];

                       $response = Http::withHeaders($header)->post($endPoint, $payload);

                       $responseData = $response->json();
                    }


                    //Send Mail....
                    if($order->email != null){
                        Mail::to($order->email)->send(new OrderConfirmationMail($order));
                    }
                    //Send Mail....

                $order->save();
                toastr()->success('Order has been confirmed');
                return redirect()->back();
                }
                
                else{
                    toastr()->error('Courier is not selected yet!');
                    return redirect()->back();
                }
            }
       }  
    }

    public function orderDetails ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $order = Order::where('id', $id)->with('orderDetalis')->first();
                return view('backend.admin.orders.details', compact('order'));
            }
       } 
    }

    public function orderUpdate (Request $request, $id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1 || Auth::user()-> role = 2){
                $order = Order::find($id);

                $order->c_name = $request->c_name;
                $order->c_phone = $request->c_phone;
                $order->c_email = $request->c_email;
                $order->address = $request->address;


                if(isset($request->courier_name)){
                    if($request->courier_name == 'steadfast'){
                        $order->courier_name = 'steadfast';
                    }
    
                    if($request->courier_name == 'others'){
                        $order->courier_name = $request->others_courier;
                    }

                    //Send email to Customer if email id available....
                      
                    //Send email to Customer if email id available....
                }

                $order->save();
                toastr()->success('Order is updated Successfully');
                return redirect()->back();
                
            }
        }   
    }
}
