<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\multiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class AboutController extends Controller
{
    public function admin_about() {
        // $about = DB::table('abouts')->get();
        $about = about::first();
        return view('admin.about', compact('about'));
    }
    
    // update about page data
    public function updateAbout(Request $request) {
        if(empty($request->file('new_image'))){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true). '.' . $image->getClientOriginalExtension();
            $path = public_path('images/about/' . $imageName);
            
            // Resize the image before saving it
            Image::make($image)->resize(523, 605)->save($path);
            // Delete Previous Image
            if(!empty($request->old_image)){
                $previousImagePath = public_path('images/about/' . $request->old_image);
                if(file_exists($previousImagePath)){
                    unlink($previousImagePath);
                }
            }
        }

        $about = about::find($request->id);
        $about->title = $request->title;
        $about->short_title = $request->short_title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->image = $imageName;
        if($about->save()){
            return redirect()->back();
        }
    }

    // add multiple images
    public function addMultiImages(Request $request){
        foreach ($request->file('multiImage') as $image) {
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('images/multiImages/'), $imageName);
            $path = public_path('images/multiImages/' . $imageName);
            // Resize the image before saving it
            Image::make($image)->resize(220, 220)->save($path);

            multiImage::create([
                'multi_image' => $imageName,
            ]);
        }
        return redirect()->route('aboutAllImages');
    }

    // show all about images
    public function aboutAllImages(){
        $images = multiImage::all();
        return view('admin.aboutAllImages', compact('images'));
    }

    // Edit multi images
    public function editMultiImages($id) {
        $image = multiImage::find($id);
        return view('admin.editMultiImages', compact('image'));
    }

    // update Multi Images
    public function updateMultiImages(Request $request) {
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('images/multiImages/'), $imageName);
            $path = public_path('images/multiImages/' . $imageName);
            // Resize the image before saving it
            Image::make($image)->resize(220, 220)->save($path);
            if( !empty($request->old_image) ){
                $previousImagePath = public_path('images/multiImages/' . $request->old_image);
                if(file_exists($previousImagePath)){
                    unlink($previousImagePath);
                }
            }
        }

        $image = multiImage::find($request->id);
        $image->multi_image = $imageName;
        if($image->save()) {
            return redirect()->route('aboutAllImages');
        }
    }

    // Delete All Data
    public function deleteMultiImages($id){
        $image = multiImage::find($id);
        $path = public_path('images/multiImages/' . $image->multi_image);
        unlink($path);
        $deleteImage = multiImage::find($id)->delete();
        if($deleteImage){
            return redirect()->back();
        }
    }
}
