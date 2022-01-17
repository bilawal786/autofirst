<?php

namespace App\Http\Controllers\Admin;

use App\Gurantee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuranteeController extends Controller
{
    public function index(){
        $gurantee = Gurantee::latest()->get();
        return view('admin.gurantee.index', compact('gurantee'));
    }
    public function store(Request $request){
        $gurantee = new Gurantee();
        $gurantee->name = $request->name;
        $gurantee->code = $request->code;
        $gurantee->description = $request->description;
        $gurantee->price = $request->price;
        $gurantee->max_input = $request->max_input;
        $gurantee->status = $request->status;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $gurantee->image = 'allimages/' . $name;
        }
        $gurantee->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $gurantee = Gurantee::find($id);
        $gurantee->name = $request->name;
        $gurantee->code = $request->code;
        $gurantee->description = $request->description;
        $gurantee->price = $request->price;
        $gurantee->max_input = $request->max_input;
        $gurantee->status = $request->status;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $gurantee->image = 'allimages/' . $name;
        }
        $gurantee->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $gurantee = Gurantee::find($id);
        $gurantee->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
