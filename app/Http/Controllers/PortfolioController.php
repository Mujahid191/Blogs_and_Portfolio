<?php

namespace App\Http\Controllers;

use App\Http\Requests\portfolioRequest;
use App\Models\portfolio;
use Illuminate\Http\Request;
use Image;

class PortfolioController extends Controller
{
    // all portfolio method
    public function allPortfolio() {
        $portfolios = portfolio::latest()->get();
        return view('admin.allPortfolio', compact('portfolios'));
    }

    // add portfolio method
    public function newPortfolio(portfolioRequest $request) {
        $image = $request->file('portfolio_image');
        $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/portfolio/' . $imageName);
        // Resize the image before saving it
        Image::make($image)->resize(1020, 519)->save($path);
        $portfolio = portfolio::create([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $imageName,
        ]);
        if($portfolio){
            return redirect()->route('allPortfolio');
        }
    }

    // Edit Portfolio Method
    public function editPortfolio($id){
        $portfolio = portfolio::find($id);
        return view('admin.editPortfolio', compact('portfolio'));
    }

    // Update Portfolio Method
    public function updatePortfolio(Request $request){
        if(empty($request->file('portfolio_image'))){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('portfolio_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/portfolio/' . $imageName);
            // Resize Image
            Image::make($image)->resize(1020, 519)->save($path);
            // Delete Previous Image
            if(!empty($request->old_image)){
                $previousImagePath = public_path('images/portfolio/' . $request->old_image);
                if(file_exists($previousImagePath)){
                    unlink($previousImagePath);
                }
            }
        }
        $portfolio = portfolio::find($request->id);
        $portfolio->portfolio_name = $request->portfolio_name;
        $portfolio->portfolio_title = $request->portfolio_title;
        $portfolio->portfolio_description = $request->portfolio_description;
        $portfolio->portfolio_image = $imageName;
        if($portfolio->save()){
            return redirect()->route('allPortfolio');
        }
    }

    // Delete Portfolio Method
    public function deletePortfolio($id) {
        $portfolio = portfolio::find($id);
        $path = public_path('images/portfolio/' . $portfolio->portfolio_image);
        unlink($path);
        $deletePortfolio = portfolio::find($id)->delete();
        if($deletePortfolio){
            return redirect()->back();
        }
    }
}