<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function Index(){
        $subcategories = DB::table('sub_categories')
            ->join('categories','sub_categories.category_id','categories.id')
            ->select('sub_categories.*','categories.category_en','categories.category_ban')
            ->orderby('id','desc')->paginate(6);
        return view('backend.contents.subcategory.index',compact('subcategories'));
    }
    public function CreateIndex(){
        $categories = Category::all();
        return view('backend.contents.subcategory.create',compact('categories'));
    }
    public function Create(Request $request){

        // dd($request->all());
        $request->validate([
            'subcategory_en' => 'required|unique:sub_categories|max:255',
            'subcategory_ban' => 'required|unique:sub_categories|max:255',
            'category_id' => 'required',
        ]);

        SubCategory::create([

            'subcategory_en' => $request->subcategory_en,
            'subcategory_ban' => $request->subcategory_ban,
            'category_id' => $request->category_id,
        ]);
        
        $notification = array(
            'message' => 'New SubCategory Created',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.index')->with($notification);
    }

    public function Edit($id){
        $edit = DB::table('sub_categories')->where('id',$id)->first();
        $categories = DB::table('categories')->get();
        return view('backend.contents.subcategory.edit',compact('edit','categories'));
    }

    public function Update(Request $request,$id){

        $request->validate([
            'subcategory_en' => 'required|max:255',
            'subcategory_ban' => 'required|max:255',
            'category_id' => 'required',
        ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_ban'] = $request->subcategory_ban;
        $data['category_id'] = $request->category_id;

        DB::table('sub_categories')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'SubCategory Updated!',
            'alert-type' => 'warning'
        );
        return redirect()->route('subcategory.index')->with($notification);        
    }

    public function Delete($id){

        DB::table('sub_categories')->where('id',$id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);  
    }
}
