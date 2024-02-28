<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //    VIEW product
    public function index(){
        $this->data['title'] = "Product Management";
        $this->data['active'] = "product";
        $product = product::all();
        $this->data['product'] = $product;
        return view('product.view',$this->data);
    }

//    ADD product
    public function ShowViewproductAdd(){
        $this->data['title'] = "Product Management";
        $this->data['active'] = "product";

        return view('product.add',$this->data);
    }

    public function Addproduct(Request $request){

//        VALIDATION
        $this->validate($request, [
//            'product_id' => 'required|string|max:255',
            'product' => 'required|string|max:255|unique:product',
        ]);

//        ADD NEW product
        $product = new product();
        $product->product_id = $request->input('product_id');
        $product->product = $request->input('product');
        $product->support_email = $request->input('support_email');

        $product->save();

        return redirect()->route('viewproduct')->with('success', 'The product have been successfully added');
    }
//    END OF ADD product

//    EDIT product
    function ShowViewEditproduct($id){
        $this->data['title'] = 'product Management';
        $this->data['active'] = "product";
        $this->data['product'] = Product::findOrFail($id);

        return view('product.edit',$this->data);
    }

    public function updateproduct(Request $request, $id){
        $product = Product::findOrFail($id);
        $request->validate([
//            'product_id' => 'required|string|max:255',
            'product' => 'required|string|max:255|unique:product,product,' . $product->id,
        ]);

        $product->update($request->all());

        return redirect()->route('viewproduct')->with('success', 'Product updated successfully.');
    }
//    END OF EDIT product

//    DELETE product
    public function deleteproduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Hapus product dari database
        $product->delete();

        return redirect()->route('viewproduct')->with('success', 'Product deleted successfully');
    }
}
