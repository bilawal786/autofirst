<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Season;
use App\SeasonCategory;
use App\Vehicle;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(){
        $seasons = Season::latest()->get();
        $categories = Category::all();
        return view('admin.season.index', compact('seasons', 'categories'));
    }
    public function store(Request $request){
        $season = new Season();
        $season->category_id = $request->category_id;
        $season->name = $request->name;
        $season->start_date = $request->start_date;
        $season->end_date = $request->end_date;
        $season->price = $request->price;
        $season->save();

        $season_category = new SeasonCategory();
        $season_category->season_id = $season->id;
        $season_category->category_id = $request->category_id;
        $season_category->save();

        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $season = Season::find($id);
        $season->category_id = $request->category_id;
        $season->name = $request->name;
        $season->start_date = $request->start_date;
        $season->end_date = $request->end_date;
        $season->price = $request->price;
        $season->update();
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
