<?php

namespace App\Http\Controllers\Admin;

use App\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(){
        $agency = Agency::latest()->get();
        return view('admin.agency.index', compact('agency'));
    }
    public function store(Request $request){
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->address = $request->address;
        $agency->c_address = $request->c_address;
        $agency->city = $request->city;
        $agency->price = $request->price;
        $agency->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $agency = Agency::find($id);
        $agency->name = $request->name;
        $agency->phone = $request->phone;
        $agency->address = $request->address;
        $agency->c_address = $request->c_address;
        $agency->city = $request->city;
        $agency->price = $request->price;
        $agency->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $agency = Agency::find($id);
        $agency->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
