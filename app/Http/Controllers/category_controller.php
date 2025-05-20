<?php

namespace App\Http\Controllers;

use App\Models\category_model;
use Illuminate\Http\Request;


class category_controller extends Controller
{
    public function categoryadd(Request $request){
        $category = new category_model(); 
        $category->name =$request->name;
        if($request->hasFile("image")){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uplode'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        return redirect("/categorylist")->with("success","category add succcesfull!");
    }

    public function showcategory()
    {
        // Fetch all contacts from the database
        $category = category_model::all();
        // Pass the contacts data to the view
        return view('admin.pages.categoryalllist', compact('category'));
    }

     public function destroyCategory($id)
    {
        $category = category_model::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Category not found!');
        }
   
    }

    public function edit($id)
{
    $category = category_model::findOrFail($id);
    return view('admin.pages.categoryedit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = category_model::findOrFail($id);
    
    $category->name = $request->name;

    // Optional: update image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uplode'), $imageName);
            $category->image = $imageName;
        }

    $category->save();

    return redirect('/categorylist')->with('success', 'Category updated successfully');
}

public function categoryshow($id)
{
    $category = category_model::findOrFail($id);
    return view('admin.pages.categoryview', compact('category'));
}

public function index(){
    $category = category_model::all();
    $data = compact('category');
    return view('pages.home')->with($data);
}


}

    
