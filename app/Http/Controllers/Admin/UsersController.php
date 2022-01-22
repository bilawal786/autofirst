<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }
    public function store(Request $request){
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        if ($request->reservation){
            $users->reservation = 1;
        }else{
            $users->reservation = 0;
        }
        if ($request->sale_counter){
            $users->sale_counter = 1;
        }else{
            $users->sale_counter = 0;
        }
        if ($request->marque){
            $users->marque = 1;
        }else{
            $users->marque = 0;
        }
        if ($request->category){
            $users->category = 1;
        }else{
            $users->category = 0;
        }
        if ($request->modals){
            $users->modals = 1;
        }else{
            $users->modals = 0;
        }
        if ($request->add_vehicles){
            $users->add_vehicles = 1;
        }else{
            $users->add_vehicles = 0;
        }
        if ($request->view_vehicles){
            $users->view_vehicles = 1;
        }else{
            $users->view_vehicles = 0;
        }
        if ($request->options){
            $users->options = 1;
        }else{
            $users->options = 0;
        }
        if ($request->gurante){
            $users->gurante = 1;
        }else{
            $users->gurante = 0;
        }
        if ($request->seasons){
            $users->seasons = 1;
        }else{
            $users->seasons = 0;
        }
        if ($request->website){
            $users->website = 1;
        }else{
            $users->website = 0;
        }
        if ($request->users){
            $users->users = 1;
        }else{
            $users->users = 0;
        }
        $users->password = Hash::make($request->password);
        if ($request->hasfile('photo')) {
            $image1 = $request->file('photo');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $users->photo = 'allimages/' . $name;
        }
        $users->save();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function update(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->phone = $request->phone;
        if ($request->reservation){
            $users->reservation = 1;
        }else{
            $users->reservation = 0;
        }
        if ($request->sale_counter){
            $users->sale_counter = 1;
        }else{
            $users->sale_counter = 0;
        }
        if ($request->marque){
            $users->marque = 1;
        }else{
            $users->marque = 0;
        }
        if ($request->category){
            $users->category = 1;
        }else{
            $users->category = 0;
        }
        if ($request->modals){
            $users->modals = 1;
        }else{
            $users->modals = 0;
        }
        if ($request->add_vehicles){
            $users->add_vehicles = 1;
        }else{
            $users->add_vehicles = 0;
        }
        if ($request->view_vehicles){
            $users->view_vehicles = 1;
        }else{
            $users->view_vehicles = 0;
        }
        if ($request->options){
            $users->options = 1;
        }else{
            $users->options = 0;
        }
        if ($request->gurante){
            $users->gurante = 1;
        }else{
            $users->gurante = 0;
        }
        if ($request->seasons){
            $users->seasons = 1;
        }else{
            $users->seasons = 0;
        }
        if ($request->website){
            $users->website = 1;
        }else{
            $users->website = 0;
        }
        if ($request->users){
            $users->users = 1;
        }else{
            $users->users = 0;
        }
        if ($request->hasfile('photo')) {
            $image1 = $request->file('photo');
            $name = time() . 'allimages' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'allimages/';
            $image1->move($destinationPath, $name);
            $users->photo = 'allimages/' . $name;
        }
        $users->update();
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id){
        $modal = User::find($id);
        $modal->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
