<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index(){
        $options = Option::latest()->get();
        return view('admin.options.index', compact('options'));
    }
    public function store(Request $request){
        $option = new Option();
        $option->name = $request->name;
        $option->code = $request->code;
        $option->description = $request->description;
        $option->price = $request->price;
        $option->max_input = $request->max_input;
        $option->status = $request->status;
        $option->per_day = $request->per_day;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $option->image = 'allimages/' . $name;
        }
        $option->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $option = Option::find($id);
        $option->name = $request->name;
        $option->code = $request->code;
        $option->description = $request->description;
        $option->price = $request->price;
        $option->max_input = $request->max_input;
        $option->status = $request->status;
        $option->per_day = $request->per_day;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $option->image = 'allimages/' . $name;
        }
        $option->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $option = Option::find($id);
        $option->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
