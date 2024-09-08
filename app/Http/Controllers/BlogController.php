<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogRequest;
use App\Models\blog;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    // All Blogs
    public function allBlogs() {
        $blogs = blog::latest()->get();
        return view('admin.allBlogs', compact('blogs'));
    }
    // Load Categories on Add New Blog
    public function addBlog() {
        $categories = category::latest()->get();
        return view('admin.addBlog', compact('categories'));
    }

    // Sava New Blog Method
    public function newBlog(blogRequest $request) {
        $image = $request->file('new_image');
        $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/blog/' . $imageName);
        // Image Resize
        Image::make($image)->resize(430, 327)->save($path);

        $blog = blog::create([
            'title' => $request->title,
            'tags' => $request->tags,
            'image' => $imageName,
            'category_id' => $request->category,
            'description' => $request->description,
        ]);
        if($blog){
            return redirect()->route('allBlogs');
        }
    }

    // Edit Blog Data
    public function editBlog($id){
        $blog = blog::find($id);
        // Retrieve all categories
        $categories = category::all();
        // Pass both blog and categories to the view
        return view('admin.editBlog', compact('blog', 'categories'));
    }

    // Blog Update Method
    public function updateBlog(Request $request){
        if(empty($request->file('new_image'))){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/blog/' . $imageName);
            // Resize Image
            Image::make($image)->resize(430, 327)->save($path);
            // Delete Previous Image
            if(!empty($request->old_image)){
                $previousImage = public_path('images/blog/' . $request->old_image);
                if(file_exists(unlink($previousImage))){
                    unlink($previousImage);
                };
            }   
        }
        $blog = blog::find($request->id);
        $blog->title  = $request->title;
        $blog->tags  = $request->tags;
        $blog->image  = $imageName;
        $blog->category_id  = $request->category;
        $blog->description  = $request->description;
        if($blog->save()){
            return redirect()->route('allBlogs');
        }
    }

    // Delete Blog Method
    public function deleteBlog($id) {
        $blog = blog::find($id);
        $path = public_path('images/blog/' . $blog->image);
        unlink($path);
        $deleteBlog = blog::find($id)->delete();
        if($deleteBlog){
            return redirect()->back();
        }
    }
}
