<?php

namespace App\Http\Controllers;

use App\Models\User;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Ramsey\Uuid\v1;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('login')->with('success','successfully logout');
    }

    //user dashboard

    public function DashboardIndex(){

        $user = User::find(Auth::user()->id);
        return view('backend.contents.user_dashboard.dashboard',compact('user'));
    }

    public function DashboardEdit($id){

        $useredit = User::find($id);
        // dd($useredit->all());
        return view('backend.contents.user_dashboard.edit',compact('useredit'));
    }

    public function DashboardStore(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->address = $request->address;
        $update->designation = $request->designation;
        $update->gender = $request->gender;

        //for image update without intervention

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$update->image));

            $fileName = date('YmdHis').'.'.$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'),$fileName);
            // $request->file->move(public_path('uploads'), $fileName);
            $update->image = $fileName;
        }
        $update->save();
        $notification = array(
            'message' => 'User Info Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ChangePassword()
    {
        return view('backend.contents.user_dashboard.change_password');
    }

    public function ChangePasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
