<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{

    public function Index(){

        $data = DB::table('posts')
            ->join('categories','posts.category_id','=','categories.id')
            ->join('sub_categories','posts.subcategory_id','=','sub_categories.id')
            ->join('districts','posts.district_id','=','districts.id')
            ->join('subdistricts','posts.subdistrict_id','=','subdistricts.id')
            ->join('users','posts.user_id','=','users.id')
            ->select('posts.*','categories.category_en','categories.category_ban','sub_categories.subcategory_en','sub_categories.subcategory_ban',
                    'districts.district_en','districts.district_ban','subdistricts.subdistrict_en','subdistricts.subdistrict_ban','users.name')
            ->orderBy('id')
            ->paginate(5);
                    
        return view('backend.contents.news_post.index',compact('data'));
    }











    public function PostCreateIndex(){

        $categories = DB::table('categories')->get();
        $districts = DB::table('districts')->get();
        return view('backend.contents.news_post.create',compact('categories','districts'));
    }

    public function PostCreate(Request $request){

        $request->validate([
            'title_en' => 'required',
            'title_ban' => 'required',
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'required',
        ]);

        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ban'] = $request->tags_ban;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['details_en'] = $request->details_en;
        $data['details_ban'] = $request->details_ban;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['user_id'] = Auth::id();
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");
        $data['created_at'] = Carbon::now();

        $image = $request->image;
        
        if ($image) {
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/newspost/'.$img_name);
            $data['image'] = 'image/newspost/'.$img_name;

            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Post Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('news.post.index')->with($notification);
        }   
    }

    public function Edit($id){

        $post = DB::table('posts')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        $subcategory = DB::table('sub_categories')->get();
        $district = DB::table('districts')->get();
        $subdistrict = DB::table('subdistricts')->get();
        $user = DB::table('users')->get();
        return view('backend.contents.news_post.edit',compact('post','category','subcategory','district','subdistrict','user'));
    }


    public function Update(Request $request,$id){

        $request->validate([
            'title_en' => 'required',
            'title_ban' => 'required',
            'category_id' => 'required',
            'district_id' => 'required',
            'image' => 'required',
        ]);

        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_ban'] = $request->title_ban;
        $data['tags_en'] = $request->tags_en;
        $data['tags_ban'] = $request->tags_ban;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['details_en'] = $request->details_en;
        $data['details_ban'] = $request->details_ban;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['user_id'] = Auth::id();
        $data['updated_at'] = Carbon::now();

        $old_image = $request->oldimage;
        $image = $request->image;
        if ($image) {
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/newspost/'.$img_name);
            $data['image'] = 'image/newspost/'.$img_name;


            DB::table('posts')->where('id',$id)->update($data);

            unlink($old_image);

            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('news.post.index')->with($notification);
        }   
    }


    public function Delete($id){

        $news = DB::table('posts')->where('id','=',$id)->first();
        if (is_file('image')){
            unlink($news);
        }      

        DB::table('posts')->where('id','=',$id)->delete();      

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }





    public function GetSubCategory($category_id){

        $subcategory = DB::table('sub_categories')->where('category_id',$category_id)->get();
        return response()->json($subcategory);
    }

    public function GetSubDistrict($district_id){

        $subdistrict = DB::table('subdistricts')->where('district_id',$district_id)->get();
        return response()->json($subdistrict);
    }
}
