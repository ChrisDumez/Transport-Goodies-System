<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderUpdates;

class UpdatesController extends Controller
{
    public function UpdateOrder(request $request)
    {
        $order = Order::find($request->orderid);

        $OrderDetail = OrderUpdates::where('orderid',$request->orderid)->get();

        $validatedData = $request->validate([
            'customerid' => 'required|min:1',
            'orderid' => 'required|min:1',
            'detail' => 'required|min:3|max:50',
            'status' => 'required|min:3|max:50',
        ]);

        $orderupdate = new OrderUpdates();
        $orderupdate->customerid = $request->customerid;
        $orderupdate->orderid = $request->orderid;
        $orderupdate->detail = $request->detail;
        $orderupdate->status = $request->status;
        $orderupdate->date = date('Y-m-d');;
        $orderupdate->save();

        return redirect()->back()->with('success', 'Order updated successfully!');

        return "Update Saved";

        return view('updates.display-orderupdates', compact('order','OrderDetail'));
    }

    public function OrdersUpdatesView($id)
    {
        $order = Order::find($id);

        $OrderDetail = OrderUpdates::where('orderid',$id)->get();

        return view('updates.display-orderupdates', compact('order','OrderDetail'));
    }
}
