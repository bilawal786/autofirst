@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">RESERVATIONS</h5>
                            <span class="h2 font-weight-bold mb-0">{{$reservations->count()}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="fas fa-car"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">CHIFFRE D'AFFAIRES</h5>
                            <span class="h2 font-weight-bold mb-0">200 €</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Dernières Réservation</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('admin.reservations')}}" class="btn btn-sm btn-primary">Voir toutes les réservations</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div>
                        <table class="table table-hover" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true" style="text-align: center;">
                            <thead class="thead-light align-items-center">
                            <tr>
                                <th scope="col">Réservation</th>
                                <th scope="col">Date création</th>
                                <th scope="col">Client</th>
                                <th scope="col">Véhicule</th>
                                <th scope="col">Dates / Durées</th>
                                <th scope="col">PRIX</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody class="align-items-center">
                            @forelse($reservations as $reservation)
                                <tr>
                                    <th scope="row">
                                        <a href=""># {{$reservation->id}}</a>
                                    </th>
                                    <td class="budget">
                                        {{$reservation->created_at}}
                                    </td>
                                    <td>
                                        {{$reservation->fname??''}} {{$reservation->lname??''}}
                                    </td>
                                    <td>
                                        {{$reservation->vehicle->marque->name??'Supreme'}} {{$reservation->vehicle->modal->name??'Supreme'}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($reservation->departure_date)->format('d/m/Y')}} - {{$reservation->departure_time}}<br>
                                        au<br> {{\Carbon\Carbon::parse($reservation->return_date)->format('d/m/Y')}} - {{$reservation->return_time}}<br>
                                        <em style="font-size: 11px">{{\Carbon\Carbon::parse($reservation->departure_date)->diffInDays($reservation->return_date)}} jours</em>
                                    </td>
                                    <td>
                                        {{$reservation->totalamount}}€
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="Details de la reservations" href="{{route('reservation.show', ['id' => $reservation->id])}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd"><td colspan="8" class="dataTables_empty" valign="top">Aucune donnée disponible dans le tableau</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
