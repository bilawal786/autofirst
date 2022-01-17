<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Marque;
use App\Modal;
use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::latest()->get();
        return view('admin.vehicle.index', compact('vehicles'));
    }
    public function create(){
        $marques = Marque::all();
        return view('admin.vehicle.create', compact('marques'));
    }
    public function fetchmodals(Request $request){
        $modal = Modal::where('marque_id', $request->id)->get();
        return response()->json($modal);
    }
    public function store(Request $request){
        $vehicle = new Vehicle();
        $vehicle->marque_id = $request->marque_id;
        $vehicle->modal_id = $request->modal_id;
        $vehicle->registration = $request->registration;
        $vehicle->franchise = $request->franchise;
        $vehicle->acqui_date = $request->acqui_date;
        $vehicle->rental_date = $request->rental_date;
        $vehicle->color = $request->color;
        $vehicle->rate_per_day = $request->rate_per_day;
        $vehicle->category = $request->category;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $vehicle->image = 'allimages/' . $name;
        }
        $vehicle->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $vehicle = Vehicle::find($id);
        $vehicle->registration = $request->registration;
        $vehicle->franchise = $request->franchise;
        $vehicle->color = $request->color;
        $vehicle->rate_per_day = $request->rate_per_day;
        $vehicle->category = $request->category;
        $vehicle->status = $request->status;
        if ($request->hasfile('image')) {
            $image1 = $request->file('image');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $vehicle->image = 'allimages/' . $name;
        }
        $vehicle->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
