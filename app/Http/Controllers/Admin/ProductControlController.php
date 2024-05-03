<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProducts(){
        $products = Product::all();
        return view('admin.product.view-products', compact('products'));
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ));
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        // $product->meta_tag = $request->input('meta_tag');
        $product->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/product/', $fileName);
            $product->image = $fileName; 
        }
        $product->status = $request->input('status')==true ? '1':'0';
        $product->save();
        return redirect()->back()->with('status', 'Your product has been saved');
    }

    public function editProduct($id){
        $product = Product::Find($id);
        return view('admin.product.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        $product = Product::Find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        // $product->meta_tag = $request->input('meta_tag');
        $product->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $destination = 'upload/product/'.$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/product/', $fileName);
            $product->image = $fileName; 
        }
        $product->update();
        return redirect('/admin/view-products')->with('status', 'Your product item has been updated');
    }

    public function deleteProduct($id){
        $product = Product::Find($id);
        $product->delete();
        return redirect('/view-products')->with('status', 'Your product item has been deleted');
    }

    public function activeProduct($id)
    {
        $product = Product::find($id);
        $product->status = '1';
        $product->update();
        return redirect()->back()->with('status', 'Product Activated');
    }

    public function deactiveProduct($id)
    {
        $product = Product::find($id);
        $product->status = '0';
        $product->update();
        return redirect()->back()->with('warning', 'Product De-activated');
    }
}
