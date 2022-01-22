<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $content = Content::find(1);
        return view('admin.content.index', compact('content'));
    }
    public function store(Request $request){
        $content = Content::find(1);
        if ($request->hasfile('logo')) {
            $image1 = $request->file('logo');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $content->logo = 'allimages/' . $name;
        }
        if ($request->hasfile('image1')) {
            $image2 = $request->file('image1');
            $name2 = time() . 'allimages' . '.' . $image2->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image2->move($destinationPath, $name2);
            $content->image1 = 'allimages/' . $name2;
        }
        if ($request->hasfile('image2')) {
            $image3 = $request->file('image2');
            $name3 = time() . 'allimages' . '.' . $image3->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image3->move($destinationPath, $name3);
            $content->image2 = 'allimages/' . $name3;
        }
        if ($request->hasfile('image3')) {
            $image4 = $request->file('image3');
            $name5 = time() . 'allimages' . '.' . $image4->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image4->move($destinationPath, $name5);
            $content->image3 = 'allimages/' . $name5;
        }
        $content->facebook = $request->facebook;
        $content->instagram = $request->instagram;
        $content->email = $request->email;
        $content->address = $request->address;
        $content->footer = $request->footer;
        $content->phone = $request->phone;
        $content->h1 = $request->h1;
        $content->d1 = $request->d1;
        $content->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
