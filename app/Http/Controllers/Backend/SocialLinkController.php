<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialLinkController extends Controller
{
 
            //social setting 

    public function EditSocial(){

        $social = DB::table('socials')->first();
        return view('backend.contents.all_setting.edit_social',compact('social'));
    }

    public function UpdateSocial(Request $request){

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['youtube'] = $request->youtube;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('socials')->update($data);

        $notification = array(
            'message' => 'socials updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

            //seo setting

    public function EditSeo(){

        $seo = DB::table('seos')->first();
        return view('backend.contents.all_setting.edit_seo',compact('seo'));
    }

    public function UpdateSeo(Request $request){

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;      
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('seos')->update($data);

        $notification = array(
            'message' => 'seo updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    
    public function EditPrayer(){

        $prayer = DB::table('prayers')->first();
        return view('backend.contents.all_setting.edit_prayer',compact('prayer'));
    }

    public function UpdatePrayer(Request $request){

        $data = array();
        $data['fajr'] = $request->fajr;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['esha'] = $request->esha;
        $data['jummah'] = $request->jummah;      
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('prayers')->update($data);

        $notification = array(
            'message' => 'prayers updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function EditLiveTv(){

        $tv = DB::table('livetvs')->first();
        return view('backend.contents.all_setting.livetv',compact('tv'));
    }


    public function UpdateLiveTv(Request $request){

        $data = array();
        $data['embed_code'] = $request->embed_code;     
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('livetvs')->update($data);

        $notification = array(
            'message' => 'live tv updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SetOffline(){

        DB::table('livetvs')->update(['status'=>0]);
        $notification = array(
            'message' => 'Tv is in Offline',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function SetOnline(){

        DB::table('livetvs')->update(['status'=>1]);
        $notification = array(
            'message' => 'Tv is in Online',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    //notice setting

    public function EditNotice(){

        $notice = DB::table('notices')->first();
        return view('backend.contents.all_setting.notice',compact('notice'));
    }

    public function UpdateNotice(Request $request){

        $data = array();
        $data['notice'] = $request->notice;     
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('notices')->update($data);

        $notification = array(
            'message' => 'notice updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function NoticeSetOffline(){

        DB::table('notices')->update(['status'=>0]);
        $notification = array(
            'message' => 'Notice is in Offline',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function NoticeSetOnline(){

        DB::table('notices')->update(['status'=>1]);
        $notification = array(
            'message' => 'Notice is in Online',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}