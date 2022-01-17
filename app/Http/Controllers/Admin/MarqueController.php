<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){
        $marque = Marque::latest()->get();
        return view('admin.marque.index', compact('marque'));
    }
    public function store(Request $request){
        $marque = new Marque();
        $marque->name = $request->name;
        $marque->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $marques = Marque::find($id);
        $marques->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
