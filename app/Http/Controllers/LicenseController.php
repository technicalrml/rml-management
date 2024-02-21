<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;

class LicenseController extends Controller
{
//    VIEW LICENSE
    public function index(){
            $this->data['title'] = 'License Management';
            $this->data['active'] = 'license';

            $getdata = (new License())->getData();
            $this->data['license'] = $getdata;

            return view('license.view',$this->data);
    }

//    ADD LICENSE
    public function ShowViewLicenseAdd(){
        $this->data['title'] = "License Management";
        $this->data['active'] = "license";

        $license = License::all();
        $this->data['license'] = $license;

        $customer = Customer::all();
        $this->data['customer'] = $customer;

        $product = Product::all();
        $this->data['product'] = $product;

        $user = User::all();
        $this->data['user'] = $user;


        return view('license.add',$this->data);
    }

    public function AddLicense(Request $request){

//        VALIDATION
        $this->validate($request, [
            'customer_id' => 'required|string|max:255',
            'product_id' => 'required|string|max:255',
            'varieties_of_products' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
//            'start_date' => 'required|date',
//            'expired_date' => 'required|date',
            'type_of_support' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
        ]);


//        ADD NEW LICENSE
        $license = new License();
        $license->customer_id = $request->input('customer_id');
        $license->product_id = $request->input('product_id');
        $license->varieties_of_products = $request->input('varieties_of_products');
        $license->pic = $request->input('pic');
        $license->start_date = $request->input('start_date');
        $license->expired_date = $request->input('expired_date');
        $license->type_of_support = $request->input('type_of_support');
        $license->description = $request->input('description');
        $license->created_by = $request->input('created_by');
        $license->update_by = $request->input('update_by');

        $license->save($request->except('update_by'));

        return redirect('license/view')->with('success', 'The license have been successfully added');
    }
//    END OF ADD LICENSE

//    EDIT LICENSE
    function ShowViewEditLicense($id){
        $this->data['title'] = 'License Management';
        $this->data['active'] = "license";

        $getdata = (new License())->getData();
        $this->data['getdata'] = $getdata;

        $this->data['license'] = License::findOrFail($id);

        $customer = Customer::all();
        $this->data['customer'] = $customer;

        $product = Product::all();
        $this->data['product'] = $product;

        $users = User::all();
        $this->data['user'] = $users;

        return view('license.edit',$this->data);
    }

    public function updatelicense(Request $request, $id){
        $license = License::findOrFail($id);
//        $request->validate([
//            'role_id' => 'required|string|max:255',
//            'license_id' => 'required|string|max:255|unique:license,license_id,' . $license->id,
//        ]);

        $license->update($request->except('created_by'));
        $license->update($request->all());

        return redirect()->route('viewlicense')->with('success', 'License updated successfully.');
    }
//    END OF EDIT LICENSE

//    DELETE LICENSE
    public function deletelicense($id)
    {
        $license = License::find($id);

        if (!$license) {
            return response()->json(['message' => 'License not found'], 404);
        }

        // Hapus role dari database
        $license->delete();

        return redirect()->route('viewlicense')->with('success', 'License deleted successfully');
    }

    //    DETAIL LICENSE
    function ShowViewDetailLicense($id){
        $this->data['title'] = 'License Management';
        $this->data['active'] = "license";

        $getdata = (new License())->getData();
        $this->data['getdata'] = $getdata;

        $this->data['license'] = License::findOrFail($id);

        $customer = Customer::all();
        $this->data['customer'] = $customer;

        $product = Product::all();
        $this->data['product'] = $product;

        $users = User::all();
        $this->data['user'] = $users;

        return view('license.detail',$this->data);
    }
}
