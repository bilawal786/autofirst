<?php

namespace App\Http\Controllers\Front;

use App\Agency;
use App\Category;
use App\Content;
use App\Gurantee;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonResource;
use App\Mail\Contract;
use App\Mail\Facture;
use App\Option;
use App\Reservation;
use App\Season;
use App\Vehicle;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
class FrontendController extends Controller
{
    public function index(){
        $content = \App\Content::find(1);
        $ve = Vehicle::latest()->where('status', 1)->get();
        $vehicles = $ve->unique('modal_id');
        $agency = Agency::latest()->get();
        return view('front.index', compact('vehicles', 'content', 'agency'));
    }
    public function success(){
        return view('front.success');
    }
    public function contact(){
        return view('front.contact');
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
        $seasons =  Season::where('start_date', '<', $depart)->where('end_date', '>', $retour)->pluck('category_id');
        $cats = Category::whereIn('id', $seasons)->get();
        return  view('front.findCar', compact('cats', 'depart', 'retour', 'start_time', 'end_time', 'options', 'gurantees', 'start_point', 'end_point', 'days'));
    }
    public function booking(Request $request){
//        dd($request->all());
        $getmonths= DB::table('reservations')
            ->where('vehicle_id', $request->vehicle_id)
            ->whereRaw('"'.$request->departure_date.'" between `departure_date` and `return_date`')
            ->first();
        if ($getmonths){
            $request->session()->flash('alert-danger', 'Cette voiture n\'est pas disponible à ces dates.!');
            return redirect()->route('front.index');
        }
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
        $reservation->flight_no = $request->flight_no;
        $reservation->start_price = $request->start_price;
        $reservation->end_price = $request->end_price;
        $reservation->rate_per_day = $request->rate_per_day;
        $reservation->payment_method = "Paiement via le site Web en ligne";
        $reservation->status = 0;

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

        return redirect()->route('front.booking.confirm', ['id' => $reservation->id]);

    }

    public function bookingConfirm($id){
        $reservation = Reservation::find($id);
        return view('front.confirmBooking', compact('reservation'));
    }
    public function confirmReservation(Request $request, $id){
        $reservation = Reservation::find($id);
        $reservation->totalamount = $request->final;
        $reservation->status = 1;
        $reservation->update();

        $data['data'] = Reservation::find($reservation->id);
        $data['gs'] = Content::find(1);


        $destinationPath = 'records';
        $taxform_name = 'facture-'.$reservation->id.'.pdf';
        $filepath = $destinationPath.'/'.$taxform_name;
        $pdf = PDF::loadView('pdf.invoice',$data);
        $pdf->setPaper('A4', 'portrait');
        $pdf->stream();
        file_put_contents($filepath, $pdf->output());


        $reservation->invoice_link = $filepath;
        $reservation->update();

        Mail::to($reservation->email)->send(new Facture($reservation));
        return view('front.success');
    }
    public function signature($id){
        return view('front.signature', compact('id'));
    }
    public function signatureSubmit(Request $request){
        $folderPath = 'allimages/';

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $signature = uniqid() . '.'.$image_type;

        $file = $folderPath . $signature;

        file_put_contents($file, $image_base64);

        $reservation = Reservation::find($request->id);
        $reservation->signature = "allimages/".$signature;

        $reservation->save();

        $data['data'] = Reservation::find($reservation->id);
        $data['gs'] = Content::find(1);

        $destinationPath = 'contract';
        $taxform_name = 'contract-'.$reservation->id.'.pdf';
        $filepath = $destinationPath.'/'.$taxform_name;
        $pdf = PDF::loadView('pdf.contract',$data);
        $pdf->setPaper('A4', 'portrait');
        $pdf->stream();
        file_put_contents($filepath, $pdf->output());

        $reservation->contract_link = $filepath;

        Mail::to($reservation->email)->send(new Contract($reservation));

        $request->session()->flash('alert-success', 'Votre signature a été envoyée avec succès. Vérifiez votre e-mail pour les détails du contrat');
        return redirect()->back();
    }
}
