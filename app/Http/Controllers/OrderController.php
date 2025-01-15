<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{
    public function AllOrdersView(request $request)
    {
        if($request->Search == null)
        {
            $OrderData = Order::all();

            $SearchText = $request->Search;
            
            return view('orders.display-allorders', compact('OrderData','SearchText'));
        }else{

            $SearchText = $request->Search;

            $OrderData = Order::where('receiver','LIKE', '%'.$request->Search.'%')
                                    ->orWhere('address','LIKE', '%'.$request->Search.'%')
                                    ->orWhere('description','LIKE', '%'.$request->Search.'%')
                                    ->get();

            return view('orders.display-allorders', compact('OrderData','SearchText'));
        }

        

        $OrderData = Order::all();

        return view('orders.display-allorders', compact('OrderData','SearchText'));
    }

    public function SearchOrder(request $request)
    {
        $validatedData = $request->validate([
            'Search' => 'required|min:3|max:20',
        ]);

        if(!$request)
        {
            return "Empty Search";
        }

        return $request->Search;
    }



    public function UpdateOrder(request $request)
    {
        $order = Order::find($request->orderid);

        $customer = Customer::find($request->customerid);

        if (!$customer) {
            return "Customer not found";
        }
        
        if (!$order) {
            return "Order not found";
        }
        
        $validatedData = $request->validate([
            'orderid' => 'required|min:1',
            'receiver' => 'required|min:3|max:20',
            'description' => 'required|min:3|max:50',
            'weight' => 'required|min:1|max:10',
            'address' => 'required|min:3|max:50',
            'distance' => 'required|min:1|max:20',
            'date' => 'required',
        ]);

        $priceperkm = 15.0;
        
        $order->receiver = $validatedData['receiver'];
        $order->description = $validatedData['description'];
        $order->weight = $validatedData['weight'];
        $order->address = $validatedData['address'];
        $order->distance = $validatedData['distance'];
        $order->date = $validatedData['date'];
        $order->price = $validatedData['distance'] * $priceperkm;

        $order->save();

        return redirect()->route('display-orderdetails', $request->orderid);
    }

    public function EditOrder(request $request)
    {
        $order = Order::find($request->orderid);

        $customer = Customer::find($request->customerid);

        if (!$customer) {
            return "Customer not found";
        }
        
        if (!$order) {
            return "Order not found";
        }

        return view('orders.edit-orderdetails', compact('order','customer'));
    }


    public function DisplayOrderDetails($id)
    {
        $order = Order::find($id);

        $customer = Customer::find($order->customerid);

        if (!$customer) {
            return "Customer not found";
        }
        
        if (!$order) {
            return "Order not found";
        }

        return view('orders.display-orderdetails', compact('order','customer'));
    }

    
    public function OrdersDashboard()
    {
        $OrderData = Order::all();

        return view('orders.orders-dashboard', compact('CustomerOrders'));
    }

    public function AddOrderView($id)
    {

        $customer = Customer::find($id);

        $CustomerOrders = Order::where('customerid',$customer->id)->get();

        if (!$customer) {
            return "Customer not found";
        }

        if (!$CustomerOrders) {
            dd('Query returned false or no data.');
        }

        return view('orders.add-orderview', compact('customer','CustomerOrders'));
    }

    public function SaveOrder(request $request)
    {
        
        $validatedData = $request->validate([
            'customerid' => 'required|min:1',
            'receiver' => 'required|min:3|max:20',
            'description' => 'required|min:3|max:50',
            'weight' => 'required|min:1|max:10',
            'address' => 'required|min:3|max:50',
            'distance' => 'required|min:1|max:20',
            'date' => 'required',
        ]);

        $priceperkm = 15.0;

        $distance_ = $request->distance;

        $totalprice = $distance_ * $priceperkm;


        //Save data into Database
        $order = new Order();
        $order->price = $totalprice;
        $order->customerid = $request->customerid;
        $order->receiver = $request->receiver;
        $order->description = $request->description;
        $order->weight = $request->weight;
        $order->address = $request->address;
        $order->distance = $request->distance;
        $order->date = $request->date;
        $order->save();


        return redirect()->back()->with('success', 'Order created successfully!');
    }


    public function overviewdashboard()
    {
        $Tables = [
            "customers" => $customercount = Customer::count(),
            "orders" => $ordercount = Order::count()
        ];

        return view('overview.overview-dashboard',$Tables);

    }


}
