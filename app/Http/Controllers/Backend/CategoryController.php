<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::orderby('id')->paginate(6);
        return view('backend.contents.category.index',compact('categories'));
    }

    public function CreateIndex(){
        return view('backend.contents.category.create');
    }

    public function Create(Request $request){

        $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_ban' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create([

            'category_en' => $request->category_en,
            'category_ban' => $request->category_ban,
        ]);
        
        $notification = array(
            'message' => 'New Category Created',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function Edit($id){

        $edit = Category::find($id);
        return view('backend.contents.category.edit',compact('edit'));
    }

    public function Update(Request $request,$id){

        $request->validate([
            'category_en' => 'required|max:255',
            'category_ban' => 'required|max:255',
        ]);

        Category::find($id)->update([

            'category_en' => $request->category_en,
            'category_ban' => $request->category_ban,
        ]);
        $notification = array(
            'message' => 'Category Updated!',
            'alert-type' => 'warning'
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function Delete($id){
        
        Category::find($id)->delete();
        $notification = array(
            'message' => 'Category Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
