@extends('layouts.front')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card p-3">
            <form action="{{route('front.reservation.confirm', ['id' => $reservation->id])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 p-3">
                        <b>{{$reservation->start->name}}</b>
                    </div>
                    <div class="col-md-4 p-3">
                        {{$reservation->start_price}} €
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-3">
                        <b>{{$reservation->end->name}}</b>
                    </div>
                    <div class="col-md-4 p-3">
                        {{$reservation->end_price}} €
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-3">
                        <b>Jours * tarif par jour</b>
                    </div>
                    <div class="col-md-4 p-3">
                        {{$reservation->days }} * {{$reservation->rate_per_day}} =  {{$reservation->days * $reservation->rate_per_day}} €
                    </div>
                </div>
                <?php
                $price = $reservation->days * $reservation->rate_per_day;
                ?>
                @if($reservation->options)
                    <?php
                    $op = json_decode($reservation->options);
                    $option_total = 0;
                    ?>
                    @foreach(json_decode($reservation->options_id) as $key => $item)
                        <?php
                        $option = \App\Option::find($item);
                        $option_total += $option->price * $op[$key];
                        ?>
                        @if($op[$key] > 0)
                            <div class="row">
                                <div class="col-md-4 p-3">
                                    <b>{{$option->name}}</b>
                                </div>
                                <div class="col-md-4 p-3">
                                    {{$option->price}} * {{$op[$key]}} = {{$option->price * $op[$key]}}€
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                @if($reservation->gurantee)
                    <?php
                    $op1 = json_decode($reservation->gurantee);
                    $gurantee_total = 0;
                    ?>
                    @foreach(json_decode($reservation->gurantee_id) as $key1 => $item1)
                        <?php
                        $option1 = \App\Gurantee::find($item1);
                        $gurantee_total += $option1->price * $op1[$key1];
                        ?>
                        @if($op1[$key1] > 0)
                            <div class="row">
                                <div class="col-md-4 p-3">
                                    <b>{{$option1->name}}</b>
                                </div>
                                <div class="col-md-4 p-3">
                                    {{$option1->price}} * {{$op1[$key1]}} = {{$option1->price * $op1[$key1]}}€
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <div class="row">
                    <div class="col-md-4 p-3">
                        <b>Montant : </b>
                    </div>
                    <div class="col-md-4 p-3">
                        <?php
                        $final = $reservation->start_price + $reservation->end_price + $price + $option_total + $gurantee_total;
                        ?>
                        {{$final}}€
                    </div>
                </div>
                <input type="hidden" value="{{$final}}" name="final">
                <div class="row">
                    <div class="col-md-4 p-3">
                        <b><button type="submit" class="btn btn-primary">Confirmer la réservation</button></b>
                    </div>
                    <div class="col-md-4 p-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
