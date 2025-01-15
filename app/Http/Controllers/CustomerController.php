<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;

class CustomerController extends Controller
{
    
    public function UpdateCustomerDetails(request $request)
    {
        $customer = Customer::find($request->id);
        
        $validated = $request->validate([
            'id' => 'required|min:1',
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:50',
            'organisation' => 'required|min:3|max:50',
            'phone' => 'required|min:10|max:10',
            'email' => 'required|email|min:5|max:50',
        ]);

        $customer->id = $validated['id'];
        $customer->firstname = $validated['firstname'];
        $customer->lastname = $validated['lastname'];
        $customer->organisation = $validated['organisation'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'];

        $customer->save();

        return redirect()->route('display-customerdetails', ['id' => $request->id]);
    }

    public function EditCustomerDetails($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit-customerdetails', compact('customer'));
    }

    public function DisplayCustomerDetails($id)
    {
        $customer = Customer::find($id);

        return view('customers.display-customerdetails', compact('customer'));
    }

    public function EditCustomer($id)
    {  
        return $id;

    }

    public function CustomersDashboard()
    {
        $CustomerData = Customer::all();

        return view('customers.customers-dashboard', compact('CustomerData'));
    }

    public function addCustomer(request $request)
    {
        //Input Validation
        $validatedData = $request->validate([
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'organisation' => 'required|min:3|max:20',
            'phone' => 'required|min:10|max:10',
            'email' => 'required|email|min:5|max:50|unique:users,email'
        ]);

        Customer::create($validatedData);

        return redirect()->back()->with('success', 'Customer added successfully!');

    }

}
