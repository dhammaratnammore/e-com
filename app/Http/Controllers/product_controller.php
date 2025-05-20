<?php

namespace App\Http\Controllers;

use App\Models\cart_model;
use App\Models\category_model;
use App\Models\product_model;
use Illuminate\Http\Request;

class product_controller extends Controller
{
    public function addproduct(Request $request){
        $product = new product_model();
        $product->name =$request->name;

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uplode'), $imageName);
        $product->image = $imageName;

        $product->category_id =$request->category_id;
        $product->description =$request->description;
        $product->price=$request->price;
        $product->save();
        return redirect('/productlist')->with('success','data add successful!!');
    }
    }

    public function selectcat(){
        $category = category_model::all();
        $data=compact('category');
        return view("admin.pages.productform")->with($data);
    }

    public function productshow(){
        $product = product_model::join("category", "products.category_id", "category.id")
    ->select("category.name as category_name", "products.*")
    ->get();
        $data=compact('product');
        return view("admin.pages.productalllist")->with($data);
    }
    public function deleteproduct($id){
        product_model::find($id)->delete();
        return redirect()->back();

    }

    public function edit($id)
{
    $product = product_model::findOrFail($id);
    $categories = category_model::all(); // for dropdown
    return view('admin.pages.productedit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = product_model::findOrFail($id);
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uplode'), $imageName);
        $product->image = $imageName;
    }

    $product->save();
    return redirect('/productalllist')->with('success', 'Product updated successfully.');
}

public function show($id)
{
    $product = product_model::with('category')->findOrFail($id);
    return view('admin.pages.productview', compact('product'));
}
public function productshowonshop(){
    $product=product_model::all();
    $data=compact('product');
    return view('pages.service')->with($data);

}

//cart function

public function addtocart($id) {
    $cartarry=product_model::where('id',$id)->first();
    $alreadyincart =cart_model::where('name',$cartarry->name)->exists();

    if($alreadyincart){
        return back();
    }
    else{
        $cart=new cart_model;
        $cart-> name = $cartarry->name;
        $cart-> image = $cartarry->image;
        $cart-> description = $cartarry->description;
        $cart-> price = $cartarry->price;
        $cart->save();
        return back();
    
    }
    
}

public function showdataoncart(){
    $cart = cart_model::all();
    $data = compact('cart');
    return view('pages.cart')->with($data);
}

}
