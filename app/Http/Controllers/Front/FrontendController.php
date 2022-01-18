<?php

namespace App\Http\Controllers\Front;

use App\Gurantee;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonResource;
use App\Option;
use App\Reservation;
use App\Season;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function success(){
        return view('front.success');
    }
    public function findCar(Request $request){
        $depart = Carbon::parse($request->departure_date)->format('Y-m-d');
        $retour = Carbon::parse($request->return_date)->format('Y-m-d');
        $start_time = $request->departure_time;
        $end_time = $request->return_time;
        $start_point = $request->start_point;
        $end_point = $request->end_point;
        $datetime1 = new DateTime($depart);
        $datetime2 = new DateTime($retour);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $options = Option::latest()->where('status', 1)->get();
        $gurantees = Gurantee::latest()->where('status', 1)->get();
        $seasons =  Season::where('start_date', '<', $depart)->where('end_date', '>', $retour)->get();
        return  view('front.findCar', compact('seasons', 'depart', 'retour', 'start_time', 'end_time', 'options', 'gurantees', 'start_point', 'end_point', 'days'));
    }
    public function booking(Request $request){
//        dd($request->all());
        $reservation = new Reservation();
        $reservation->start_point = $request->start_point;
        $reservation->end_point = $request->end_point;
        $reservation->departure_date = $request->departure_date;
        $reservation->departure_time = $request->departure_time;
        $reservation->return_date = $request->return_date;
        $reservation->return_time = $request->return_time;
        $reservation->days = $request->days;
        $reservation->totalamount = $request->totalamount;
        $reservation->fname = $request->fname;
        $reservation->lname = $request->lname;
        $reservation->dob = $request->dob;
        $reservation->place_of_birth = $request->place_of_birth;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->permit = $request->permit;
        $reservation->permit_issue = $request->permit_issue;
        $reservation->permit_place = $request->permit_place;
        $reservation->address = $request->address;
        $reservation->postal_code = $request->postal_code;
        $reservation->city = $request->city;
        $reservation->country = $request->country;
        $reservation->adults = $request->adults;
        $reservation->children = $request->children;
        $reservation->babies = $request->babies;
        $reservation->details = $request->details;
        $reservation->vehicle_id = $request->vehicle_id;

        if($request->options){
            foreach($request->options as $option)
            {
                $data[] = $option;
                $reservation->options = json_encode($data);
            }
        }
        if($request->options_id){
            foreach($request->options_id as $option1)
            {
                $data1[] = $option1;
                $reservation->options_id = json_encode($data1);
            }
        }
        if($request->gurantee){
            foreach($request->gurantee as $option2)
            {
                $data2[] = $option2;
                $reservation->gurantee = json_encode($data2);
            }
        }
        if($request->gurantee_id){
            foreach($request->gurantee_id as $option3)
            {
                $data3[] = $option3;
                $reservation->gurantee_id = json_encode($data3);
            }
        }
        $reservation->save();
        return redirect()->route('payment.success');

    }
}
