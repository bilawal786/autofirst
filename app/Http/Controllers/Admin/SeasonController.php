<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
use App\Vehicle;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(){
        $seasons = Season::latest()->get();
        $vehicles = Vehicle::all();
        return view('admin.season.index', compact('seasons', 'vehicles'));
    }
    public function store(Request $request){
        $season = new Season();
        $season->vehicle_id = $request->vehicle_id;
        $season->name = $request->name;
        $season->start_date = $request->start_date;
        $season->end_date = $request->end_date;
        $season->price = $request->price;
        $season->save();
//        Vehicle::find($request->vehicle_id)->update(['rate_per_day' => $request->price]);
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $season = Season::find($id);
        $season->vehicle_id = $request->vehicle_id;
        $season->name = $request->name;
        $season->start_date = $request->start_date;
        $season->end_date = $request->end_date;
        $season->price = $request->price;
        $season->update();
//        Vehicle::find($request->vehicle_id)->update(['rate_per_day' => $request->price]);
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $season = Season::find($id);
        $season->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
