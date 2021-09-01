<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
         return view('index');
    }

 
    
    public function create()
    {
        return view('create');
    }

  
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            "file_path" => $request->file->hashName(),
            'qty' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' 
            ]);

            $request->file->store('product', 'public');

            $product = new Product([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName()
            ]);
                
            $product->save();
            product::create($request->all());
   
                        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
       }
    }
    
    
    public function show($id)
    {
        $product = product::find($id);
        return view('show',compact('product'));
    }

    
    
    public function edit($id)
    {
        $product = product::find($id);
        return view('edit',compact('product','id'));
    }

  
    
    public function update($id)
    {
        $product = product::find($id);
        $product->name = request('name');
        $product->file_path = request('file_path');
        $product->qty = request('qty');
        $product->price = request('price');
        $product->save();
        
        $request->validate( 
            [
                'name' => 'required',
                'file_path' => 'required',
                'qty' => 'required',
                'price' => 'required',
            ]
        );

        $product->update($request->all());
  
        return redirect()->route('index')
                        ->with('success','Product updated successfully');
    }

    
    
    public function destroy($id)
    {
        product::find($id)->delete();
  
        return redirect()->route('index')
                        ->with('success','Product deleted successfully');
    }


}
