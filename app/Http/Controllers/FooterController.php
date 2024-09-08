<?php

namespace App\Http\Controllers;

use App\Models\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // Footer Page Setup
    public function footerPage() {
        $footer = footer::first();
        return view('admin.footerPage', compact('footer'));
    }

    // Footer Page Update
    public function updateFooter(Request $request) {
        $footer = footer::first();
        $footer->number = $request->number;
        $footer->short_title = $request->short_title;
        $footer->country = $request->country;
        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->linkedin = $request->linkedin;
        $footer->instagram = $request->instagram;
        $footer->copyright = $request->copyright;
        if($footer->save()){
            return redirect()->back();
        }
    }
}
