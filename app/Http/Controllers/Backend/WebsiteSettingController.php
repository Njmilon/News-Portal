<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class WebsiteSettingController extends Controller
{
    public function WebsiteSettingEditIndex(){

        $setting = DB::table('websitesettings')->first();
        return view('backend.contents.all_setting.wesite_setting',compact('setting'));
    }

    public function WebsiteSettingStore(Request $request){

    $headerold = DB::table('websitesettings')->first();
        if (is_file('header_logo')){
            unlink($headerold);
        }  

    $footerold = DB::table('websitesettings')->first();
        if (is_file('footer_logo')){
            unlink($footerold);
        } 

     $data = array();
  	 $data['address_en'] = $request->address_en;
  	 $data['address_ban'] = $request->address_ban;
   	 $data['phone_no'] = $request->phone_no;
  	 $data['hotline_no'] = $request->hotline_no;
  	 $data['email'] = $request->email;
  	  

       $headeroldlogo = $request->headeroldlogo;
    
       $footeroldlogo = $request->footeroldlogo;


  	 $header_logo = $request->header_logo;
  	 	if ($header_logo) {
  	 		$image_one = uniqid().'.'.$header_logo->getClientOriginalExtension(); 
  	 		Image::make($header_logo)->resize(320,130)->save('image/logo/'.$image_one);
  	 		$data['header_logo'] = 'image/logo/'.$image_one;
  	 		// image/postimg/343434.png 	 	
  	 	}
        else{
  	 		$data['header_logo'] = $headeroldlogo;
  	 	} 
    
     $footer_logo = $request->footer_logo;
        if ($footer_logo) {
            $image_two = uniqid().'.'.$footer_logo->getClientOriginalExtension(); 
            Image::make($footer_logo)->resize(320,130)->save('image/logo/'.$image_two);
            $data['footer_logo'] = 'image/logo/'.$image_two;
            // image/postimg/343434.png 	 	
        }
        else{
            $data['footer_logo'] = $footeroldlogo;
        } 

        DB::table('websitesettings')->update($data);
  	 		

            $notification = array(
                'message' => 'Website setting Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    } // End Method 
 

    }

