<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Jetstream\DeleteUser;
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
        return redirect()->route('user.role.index')->with($notification);
    }

    public function Index(){

        $users = DB::table('users')->where('type',0)->get();
        return view('backend.contents.user_role.index',compact('users'));
    }

    public function EditUser($id){

        $edituser = DB::table('users')->where('id',$id)->first();
        return view('backend.contents.user_role.edit',compact('edituser'));
    }

    public function UpdateUser(Request $request,$id){

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

        DB::table('users')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'User Role Updated',
            'alert-type' => 'warning'
        );
        return redirect()->route('user.role.index')->with($notification);
    }
}
