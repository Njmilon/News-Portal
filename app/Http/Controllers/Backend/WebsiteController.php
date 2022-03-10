<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function Index(){

        $websites = DB::table('websites')->paginate(5);
        return view('backend.contents.important_website.index',compact('websites'));
    }

    public function CreateIndex(){

        return view('backend.contents.important_website.create');
    }

    public function CreateStore(Request $request){

        $request->validate([
            'website_title' => 'required',
            'website_link' => 'required',
        ]);

        $data = array();
        $data['website_title'] = $request->website_title;
        $data['website_link'] = $request->website_link;
        $data['created_at'] = Carbon::now();

        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'Website Link Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('website.index')->with($notification);
    }

    public function Edit($id){

        $edit = DB::table('websites')->where('id',$id)->first();
        return view('backend.contents.important_website.edit',compact('edit'));
    }

    public function UpdateStore(Request $request, $id){

        $request->validate([
            'website_title' => 'required',
            'website_link' => 'required',
        ]);

        $data = array();
        $data['website_title'] = $request->website_title;
        $data['website_link'] = $request->website_link;
        $data['updated_at'] = Carbon::now();

        DB::table('websites')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Website Link Updated Successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->route('website.index')->with($notification);
    }

    public function Delete($id){

        DB::table('websites')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Website Link Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
