<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function Index(){

        $districts = DB::table('districts')->orderby('id') ->paginate(6);
        return view('backend.contents.district.index',compact('districts'));
    }
    public function CreateIndex(){
        return view('backend.contents.district.create');
    }
    public function Create(Request $request){

        $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_ban' => 'required|unique:districts|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ban'] = $request->district_ban;

        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'New Division Created',
            'alert-type' => 'success'
        );
        return redirect()->route('district.index')->with($notification);
    }
    public function Edit($id){

        $edit = DB::table('districts')->where('id',$id)->first();
        return view('backend.contents.district.edit',compact('edit'));
    }

    public function Update(Request $request,$id){

        $request->validate([
            'district_en' => 'required|max:255',
            'district_ban' => 'required|max:255',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_ban'] = $request->district_ban;

        DB::table('districts')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Division Updated!',
            'alert-type' => 'warning'
        );
        return redirect()->route('district.index')->with($notification);
    }

    public function Delete($id){
 
        DB::table('districts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Division Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}