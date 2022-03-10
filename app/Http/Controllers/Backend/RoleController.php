<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function RoleCreateIndex(){

        return view('backend.contents.user_role.create');
    }
    public function StoreRole(Request $request){

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['division'] = $request->division;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['advertisement'] = $request->advertisement;
        $data['role'] = $request->role;
        $data['type'] = 0;

        DB::table('users')->insert($data);

        $notification = array(
            'message' => 'New User Role Created',
            'alert-type' => 'success'
        );
        return redirect()->route('create.role.index')->with($notification);//need modification
    }

    public function Index(){

        $users = DB::table('users')->where('type',0)->get();
        return view('backend.contents.user_role.index',compact('users'));
    }
}
