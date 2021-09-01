<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
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
       }    }
}
