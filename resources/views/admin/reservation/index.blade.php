@extends('layouts.app')
@push('pg_btn')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Toutes les Réservations</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
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
                                            <a class="btn delete btn-danger btn-sm m-1" style="color: white"id="btn-resa-update" data-toggle="modal" data-target="#modalSuppressionResa{{$reservation->id}}" title="Suppression">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <div class="modal fade" id="modalSuppressionResa{{$reservation->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSuppressionResa{{$reservation->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                    <div class="modal-content bg-gradient-danger">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">Confirmation</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('delete.reservation', ['id' => $reservation->id])}}" method="get" class="form-horizontal form-bordered">
                                                                @csrf
                                                                <div class="py-3 text-center">
                                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                                    <h4 class="heading mt-4"></h4>
                                                                    <p>Voulez-vous vraiment supprimer cette reservation ?</p>
                                                                    <p>Cette action est irreversible.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                                    <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
@endsection
