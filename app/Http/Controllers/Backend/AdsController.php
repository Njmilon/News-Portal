<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class AdsController extends Controller
{
    public function AdsIndex(){

        $allads = DB::table('ads')->orderBy('id','desc')->get();
        return view('backend.contents.advertisement.index',compact('allads'));
    }

    public function AdsCreateIndex(){

        return view('backend.contents.advertisement.create');
    }

    public function AdsCreate(Request $request){

        $data = array();
        $data['link'] = $request->link;
        $data['type'] = $request->type;

        $image = $request->image;
        
        // if ($image) {
        //     $img_name = uniqid().'.'.$image->getClientOriginalExtension();
        //     Image::make($image)->resize(500,300)->save('image/advertisement/'.$img_name);
        //     $data['image'] = 'image/advertisement/'.$img_name;

        //     DB::table('ads')->insert($data);

        //     $notification = array(
        //         'message' => 'Photo Gallery Created Successfully',
        //         'alert-type' => 'success'
        //     );
        //     return redirect()->route('all.ads.index')->with($notification);
        // }   
        
        if ($request->type == 1) {
            
            $image = $request->image;
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,90)->save('image/advertisement/'.$img_name);
            $data['image'] = 'image/advertisement/'.$img_name;
            $data['type'] = 1;

            DB::table('ads')->insert($data);

            $notification = array(
                'message' => 'New Horizontal Ads Created',
                'alert-type' => 'success'
            );
            return redirect()->route('all.ads.index')->with($notification);  
        } 
        else {
           
            $image = $request->image;
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->save('image/advertisement/'.$img_name);
            $data['image'] = 'image/advertisement/'.$img_name;
            $data['type'] = 0;

            DB::table('ads')->insert($data);

            $notification = array(
                'message' => 'New Vertical Ads Created',
                'alert-type' => 'success'
            );
            return redirect()->route('all.ads.index')->with($notification);  
        } 
    }

    public function AdsDelete($id){

        $delete = DB::table('ads')->where('id',$id)->first();
        
        $old_image = $delete->image;
        if (is_file($old_image)){  
            unlink($old_image);
        }
       

        DB::table('ads')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Ads Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
