<?php

namespace App\Http\Controllers;

use App\Models\homeSlider;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{
    // Method for get slider data
    public function homeSlider() {
        // $homeSlide = DB::table('home_sliders')->get(); query builder
        $homeSlide = homeSlider::first();
        return view('admin.homeSlider', compact('homeSlide'));
    }

     // Method for update slider data
    public function sliderUpdate(Request $request) {
        if(empty($request->file('new_image'))){
            // if new image not added use previous image
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/homeSlide/' . $imageName);

            // Resize the image before saving it
            Image::make($image)->resize(636, 852)->save($path);
            // $image->move(public_path('images/homeSlide/'), $imageName);
            // previous image Delete
            if(!empty($request->old_image)){
                $previousImagePath = public_path('images/homeSlide') . '/' . $request->old_image;
                if(file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                };
            }
        }
        $homeSlide = homeSlider::find($request->id);
        $homeSlide->title = $request->title;
        $homeSlide->short_title = $request->short_title;
        $homeSlide->video_url = $request->url;
        $homeSlide->slider_image = $imageName;
        if($homeSlide->save()){
            return redirect()->back();
        }
    }
}
