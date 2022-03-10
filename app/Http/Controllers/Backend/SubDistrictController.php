<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    public function Index(){
        $subdistricts =DB::table('subdistricts')
            ->join('districts','subdistricts.district_id','districts.id')
            ->select('subdistricts.*','districts.district_en','districts.district_ban')
            ->orderby('id','desc')->paginate(6);
        return view('backend.contents.subdistrict.index',compact('subdistricts'));
    }
    public function CreateIndex(){
        $districts = DB::table('districts')->get();
        return view('backend.contents.subdistrict.create',compact('districts'));
    }
    public function Create(Request $request){

        $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_ban' => 'required|unique:subdistricts|max:255',
            'district_id' => 'required',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ban'] = $request->subdistrict_ban;
        $data['district_id'] = $request->district_id;

        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'New District Created',
            'alert-type' => 'success'
        );
        return redirect()->route('subdistrict.index')->with($notification);
    }

    public function Edit($id){
        $edit = DB::table('subdistricts')->where('id',$id)->first();
        $districts = DB::table('districts')->get();
        return view('backend.contents.subdistrict.edit',compact('edit','districts'));
    }

    public function Update(Request $request,$id){

        $request->validate([
            'subdistrict_en' => 'required|max:255',
            'subdistrict_ban' => 'required|max:255',
            'district_id' => 'required',
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_ban'] = $request->subdistrict_ban;
        $data['district_id'] = $request->district_id;

        DB::table('subdistricts')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'District Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('subdistrict.index')->with($notification);        
    }

    public function Delete($id){

        DB::table('subdistricts')->where('id',$id)->delete();

        $notification = array(
            'message' => 'District Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);  
    }
}

