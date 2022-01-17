<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Marque;
use App\Modal;
use App\TypeVehicle;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index(){
        $marque = Marque::all();
        $modal = Modal::latest()->get();
        $typevehicle = TypeVehicle::all();
        return view('admin.modal.index', compact('modal', 'marque', 'typevehicle'));
    }
    public function store(Request $request){
        $modal = new Modal();
        $modal->marque_id = $request->marque_id;
        $modal->name = $request->name;
        $modal->type = $request->type;
        $modal->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $modal = Modal::find($id);
        $modal->marque_id = $request->marque_id;
        $modal->name = $request->name;
        $modal->type = $request->type;
        $modal->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $modal = Modal::find($id);
        $modal->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
