<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function Index(){

        $liveTvs = DB::table('livetvs')->first();
        $prayer = DB::table('prayers')->first();
        $websites = DB::table('websites')->get();
        $firstSectionBig = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
        $firstSection = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
        $firstcategory = DB::table('categories')->first();
        $firstcatbigthum = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',1)->first();
        $firstcatsmallthum = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
        
        $secondcategory = DB::table('categories')->skip(1)->first();
        $secondcatbigthum = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
        $secondcatsmallthum = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
        return view('frontend.layouts.index',compact('liveTvs','prayer','websites','firstSectionBig','firstSection','firstcategory','firstcatbigthum',
                    'firstcatsmallthum','secondcategory','secondcatbigthum','secondcatsmallthum'));
    }



        //__language version methods__//
    public function Bangla(){

        Session::get('language');
        Session()->forget('language');
        Session()->put('language','bangla');
        return redirect()->back();
    }

    public function English(){

        Session::get('language');
        Session()->forget('language');
        Session()->put('language','english');
        return redirect()->back();
    }

    public function SinglePage($id){

        $singlepost = DB::table('posts')
                ->join('categories','posts.category_id','=','categories.id')
                ->join('sub_categories','posts.subcategory_id','=','sub_categories.id')
                ->select('posts.*','categories.category_en','categories.category_ban',
                'sub_categories.subcategory_en','sub_categories.subcategory_ban')
                ->where('posts.id',$id)->first();
                
            return view('frontend.layouts.singlepage',compact('singlepost'));
    }

    public function SingleCategory($id){

        $singlecategory = DB::table('posts')
                        ->where('category_id',$id)
                        ->orderBy('id','desc')
                        ->paginate(5);
                        

        $categoryname = DB::table('categories')->where('id',$id)->first();
                        

        return view('frontend.layouts.singlecategory',compact('singlecategory','categoryname'));
    }
    
    public function SingleSubCategory($id){

        $singlesubcategory = DB::table('posts')
                        ->where('subcategory_id',$id)
                        ->orderBy('id','desc')
                        ->paginate(5);
                        

        $subcategoryname = DB::table('sub_categories')->where('id',$id)->first();
                        

        return view('frontend.layouts.singlesubcategory',compact('singlesubcategory','subcategoryname'));
    }
}
