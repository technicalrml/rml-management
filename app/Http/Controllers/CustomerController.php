<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //    VIEW customer
    public function index(){
        $this->data['title'] = "Customer Management";
        $this->data['active'] = "customer";
        $customer = Customer::all();
        $this->data['customer'] = $customer;
        return view('customer.view',$this->data);
    }

//    ADD customer
    public function ShowViewcustomerAdd(){
        $this->data['title'] = "Customer Management";
        $this->data['active'] = "customer";

        return view('customer.add',$this->data);
    }

    public function Addcustomer(Request $request){

//        VALIDATION
        $this->validate($request, [
//            'customer_id' => 'required|string|max:255',
            'customer' => 'required|string|max:255|unique:customer',
        ]);

//        ADD NEW customer
        $customer = new customer();
        $customer->customer_id = $request->input('customer_id');
        $customer->customer = $request->input('customer');

        $customer->save();

        return redirect()->route('viewcustomer')->with('success', 'The customer have been successfully added');
    }
//    END OF ADD customer

//    EDIT customer
    function ShowViewEditcustomer($id){
        $this->data['title'] = 'customer Management';
        $this->data['active'] = "customer";
        $this->data['customer'] = Customer::findOrFail($id);

        return view('customer.edit',$this->data);
    }

    public function updatecustomer(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $request->validate([
//            'customer_id' => 'required|string|max:255',
            'customer' => 'required|string|max:255|unique:customer,customer,' . $customer->id,
        ]);

        $customer->update($request->all());

        return redirect()->route('viewcustomer')->with('success', 'Customer updated successfully.');
    }
//    END OF EDIT customer

//    DELETE customer
    public function deletecustomer($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // Hapus customer dari database
        $customer->delete();

        return redirect()->route('viewcustomer')->with('success', 'Customer deleted successfully');
    }
}
