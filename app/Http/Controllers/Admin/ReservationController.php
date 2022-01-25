<?php

namespace App\Http\Controllers\Admin;

use App\Agency;
use App\Category;
use App\Content;
use App\Gurantee;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonResource;
use App\Mail\Facture;
use App\Option;
use App\Reservation;
use App\Season;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
class ReservationController extends Controller
{
    public function reservations(){
        $reservations = Reservation::latest()->get();
        return view('admin.reservation.index', compact('reservations'));
    }
    public function direct(){
        $options = Option::latest()->get();
        $garanties = Gurantee::latest()->get();
        $vehicles = Vehicle::latest()->get();
        $agency = Agency::latest()->get();
        return view('admin.reservation.direct', compact('options', 'garanties', 'vehicles', 'agency'));
    }
    public function json(Request $request){
        $depart = $request->date_depart;
        $retour = $request->date_retour;
        $season =  Season::where('start_date', '<', $depart)->where('end_date', '>', $retour)->pluck('category_id');
        $cat = Category::whereIn('id', $season)->get();
        $json = SeasonResource::collection($cat);
        return response()->json($json);
    }
    public function store(Request $request){
//        dd($request->all());
       $reservation = new Reservation();
        $reservation->end_price = $request->end_price;
        $reservation->start_price = $request->start_price;
        $reservation->start_point = $request->start_point;
        $reservation->end_point = $request->end_point;
        $reservation->departure_date = $request->date_depart;
        $reservation->departure_time = $request->departure_time;
        $reservation->return_date = $request->date_retour;
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
        $reservation->flight_no = $request->flight_no;
        $reservation->payment_method = $request->payment_method;
        $reservation->rate_per_day = $request->rate_per_day;

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

        $data['data'] = Reservation::find($reservation->id);
        $data['gs'] = Content::find(1);


        $destinationPath = 'records';
        $taxform_name = 'facture-'.$reservation->id.'.pdf';
        $filepath = $destinationPath.'/'.$taxform_name;
        $pdf = PDF::loadView('pdf.invoice',$data);
        $pdf->setPaper('A4', 'portrait');
        $pdf->stream();
        file_put_contents($filepath, $pdf->output());


        $destinationPath1 = 'records';
        $taxform_name1 = 'contract-'.$reservation->id.'.pdf';
        $filepath1 = $destinationPath1.'/'.$taxform_name1;
        $pdf1 = PDF::loadView('pdf.contract',$data);
        $pdf1->setPaper('A4', 'portrait');
        $pdf1->stream();
        file_put_contents($filepath1, $pdf1->output());


        $reservation->invoice_link = $filepath;
        $reservation->contract_link = $filepath1;
        $reservation->update();

        Mail::to($reservation->email)->send(new Facture($reservation));
        $notification = array(
            'messege' => 'Ajouté avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function show($id){
        $reservation = Reservation::find($id);
        return view('admin.reservation.show', compact('reservation'));
    }
    public function calender(){
        $reservations = Reservation::latest()->get();
        return view('admin.reservation.calender', compact('reservations'));
    }
    public function reservationsDelete($id){
        $reservationsDelete = Reservation::find($id);
        $reservationsDelete->delete();
        $notification = array(
            'messege' => 'Supreme!',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.reservations')->with($notification);
    }
    public function contract($id){
        $data['data'] = Reservation::find($id);
        $data['gs'] = Content::find(1);
        $pdf = PDF::loadView('pdf.contract',$data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
    public function invoice($id){
        $data['data'] = Reservation::find($id);
        $data['gs'] = Content::find(1);
        $pdf = PDF::loadView('pdf.invoice',$data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
