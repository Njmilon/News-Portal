<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function PhotoIndex(){

        $photos = DB::table('galleries')->paginate(5);
        return view('backend.contents.gallery.index',compact('photos'));
    }

    public function PhotoCreateIndex(){

        return view('backend.contents.gallery.create');
    }

    public function PhotoCreate(Request $request){

        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['created_at'] = Carbon::now();

        $image = $request->image;
        
        if ($image) {
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/gallery/'.$img_name);
            $data['image'] = 'image/gallery/'.$img_name;

            DB::table('galleries')->insert($data);

            $notification = array(
                'message' => 'Photo Gallery Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('photo.gallery.index')->with($notification);
        }   
    }

    public function PhotoEdit($id){

        $edit = DB::table('galleries')->where('id',$id)->first();
        return view('backend.contents.gallery.edit',compact('edit'));
    }

    public function PhotoUpdate(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;
        $data['updated_at'] = Carbon::now();

        $old_image = $request->oldimage;
        $image = $request->image;
        if ($image) {
            $img_name = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,300)->save('image/gallery/'.$img_name);
            $data['image'] = 'image/gallery/'.$img_name;


            DB::table('galleries')->where('id',$id)->update($data);

            unlink($old_image);

            $notification = array(
                'message' => 'Photo Gallery Updated Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->route('photo.gallery.index')->with($notification);
        }   
    }

    public function PhotoDelete($id){

        $delete = DB::table('galleries')->where('id',$id)->first();
        
        $old_image = $delete->image;
        if (is_file($old_image)){  
            unlink($old_image);
        }
       

        DB::table('galleries')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Photo Gallery Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


//video gallery methods start

    public function VideoIndex(){
        $video = DB::table('videogalaries')->orderBy('id','desc')->paginate(5);
        return view('backend.contents.video_gallary.index' ,compact('video'));
    }
 
    public function VideoCreateIndex(){

        return view('backend.contents.video_gallary.create');
    }

    public function VideoCreate(Request $request){

        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;

        DB::table('videogalaries')->insert($data);
 
        $notification = array(
              'message' => 'Video Inserted Successfully',
              'alert-type' => 'info'
          );
 
          return Redirect()->route('video.gallery.index')->with($notification);
 
   }

   public function VideoEdit($id){

        $edit = DB::table('videogalaries')->where('id',$id)->first();
        return view('backend.contents.video_gallary.edit',compact('edit'));
   }

   public function VideoUpdate(Request $request,$id){

    $data = array();
    $data['title'] = $request->title;
    $data['embed_code'] = $request->embed_code;
    $data['type'] = $request->type;

    DB::table('videogalaries')->where('id',$id)->update($data);

    $notification = array(
          'message' => 'Video Gallery Updated',
          'alert-type' => 'warning'
      );

      return Redirect()->route('video.gallery.index')->with($notification);

    }

    public function VideoDelete($id){

        DB::table('videogalaries')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Video Gallery Deleted!',
            'alert-type' => 'error'
        );
  
        return Redirect()->back()->with($notification);
  
    }
}
