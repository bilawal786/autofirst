
@extends('layouts.app')
@push('pg_btn')
@endpush
@section('content')
    <style>.table.spec td{border-top:none!important;text-align:left!important;font-size: 0.87rem;}
        td, th{text-align:left!important}
    </style>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <!-- card 1 -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="headrer-title">Informations clients</h4>
                            <div class="table-responsive">
                                <table class="table spec">
                                    <tbody style="text-align:left">
                                    <tr>
                                        <td scope="row">
                                            <strong class="bold">Nom :</strong> {{$reservation->fname}} {{$reservation->lname}}
                                        </td>
                                        <td scope="row">
                                            <strong class="bold">Email :</strong> {{$reservation->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <strong class="bold">Adresse :</strong> {{$reservation->address}}, {{$reservation->postal_code}} {{$reservation->city}} - {{$reservation->country}}
                                        </td>
                                        <td scope="row">
                                            <strong class="bold">Téléphone :</strong> {{$reservation->phone}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <strong class="bold">Date création :</strong> {{$reservation->created_at}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <strong class="bold">Véhicule :</strong> {{$reservation->vehicle->marque->name??''}} {{$reservation->vehicle->modal->name??''}} - {{$reservation->vehicule->registeration??""}}
                                        </td>
                                        <td scope="row">
                                            <strong class="bold">Nb de personne :</strong> {{$reservation->adults.' adultes'}}  - {{$reservation->children.' enfants'}} - {{$reservation->babies.' bébé(s)'}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
{{--                                    <a style="margin:auto;color: white;" href="{{url('/contrat/'.$slug)}}" class="btn btn-effect-ripple btn-xs btn-info" target="_blank">Voir le Contrat</a>--}}
{{--                                    <a style="margin:auto;color: white;" href="{{url('/facture/'.$slug)}}" class="btn btn-effect-ripple btn-xs btn-success" target="_blank">Voir la Facture</a>--}}
{{--                                <!--<a type="button" id="btn-resa-update" data-toggle="modal" data-target="#modalPayer{{$reservation->id}}" class="btn btn-effect-ripple btn-xs btn-warning" data-original-title="Modifier les dates réservation">--}}
{{--                        <i class="fa fa-gear"></i> Modifier les dates de réservation--}}
{{--                      </a>-->--}}
{{--                                    <a style="margin:auto;color: white;" id="btn-resa-delete" data-toggle="modal" data-target="#modalSuppressionResaT{{$reservation->id}}" title="Suppression" class="btn btn-effect-ripple btn-xs btn-danger">Supprimer</a>--}}
                                    <div class="modal fade" id="modalSuppressionResaT{{$reservation->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSuppressionResaT{{$reservation->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                            <div class="modal-content bg-gradient-danger">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modal-title-notification">Confirmation</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('delete.reservation', $reservation->id)}}" method="post" class="form-horizontal form-bordered">
                                                        @csrf
                                                        @method('DELETE')
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
                                    <div class="modal fade" id="modalPayer{{$reservation->id}}" tabindex="-1" role="dialog" aria-labelledby="modalPayer{{$reservation->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                            <div class="modal-content bg-gradient-danger">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modal-title-notification">Confirmation</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update_date{{$reservation->id}}" method="post" class="form-horizontal form-bordered">
                                                        @csrf
                                                        <div class="py-3 text-center">
                                                            <i class="ni ni-bell-55 ni-3x"></i>
                                                            <h4 class="heading mt-4">Modification des dates de reservation</h4>
                                                            <div class="form-group row">
                                                                <label class="col-md-12 col-form-label">Date Debut </label>
                                                                <div class="col-md-6">
                                                                    <input type="date" name="date_debut" class="form-control" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="custom-select d-block w-100" name="heure_debut" id="pickup-time">
                                                                        <option value="00:00">00:00</option>
                                                                        <option value="00:30">00:30</option>
                                                                        <option value="01:00">01:00</option>
                                                                        <option value="01:30">01:30</option>
                                                                        <option value="02:00">02:00</option>
                                                                        <option value="02:30">02:30</option>
                                                                        <option value="03:00">03:00</option>
                                                                        <option value="03:30">03:30</option>
                                                                        <option value="04:00">04:00</option>
                                                                        <option value="04:30">04:30</option>
                                                                        <option value="05:00">05:00</option>
                                                                        <option value="05:30">05:30</option>
                                                                        <option value="06:00">06:00</option>
                                                                        <option value="06:30">06:30</option>
                                                                        <option value="07:00">07:00</option>
                                                                        <option value="07:30">07:30</option>
                                                                        <option value="08:00">08:00</option>
                                                                        <option value="08:30">08:30</option>
                                                                        <option value="09:00">09:00</option>
                                                                        <option value="09:30">09:30</option>
                                                                        <option value="10:00" selected>10:00</option>
                                                                        <option value="10:30">10:30</option>
                                                                        <option value="11:00">11:00</option>
                                                                        <option value="11:30">11:30</option>
                                                                        <option value="12:00">12:00</option>
                                                                        <option value="12:30">12:30</option>
                                                                        <option value="13:00">13:00</option>
                                                                        <option value="13:30">13:30</option>
                                                                        <option value="14:00">14:00</option>
                                                                        <option value="14:30">14:30</option>
                                                                        <option value="15:00">15:00</option>
                                                                        <option value="15:30">15:30</option>
                                                                        <option value="16:00">16:00</option>
                                                                        <option value="16:30">16:30</option>
                                                                        <option value="17:00">17:00</option>
                                                                        <option value="17:30">17:30</option>
                                                                        <option value="18:00">18:00</option>
                                                                        <option value="18:30">18:30</option>
                                                                        <option value="19:00">19:00</option>
                                                                        <option value="19:30">19:30</option>
                                                                        <option value="20:00">20:00</option>
                                                                        <option value="20:30">20:30</option>
                                                                        <option value="21:00">21:00</option>
                                                                        <option value="21:30">21:30</option>
                                                                        <option value="22:00">22:00</option>
                                                                        <option value="22:30">22:30</option>
                                                                        <option value="23:00">23:00</option>
                                                                        <option value="23:30">23:30</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-12 col-form-label">Date Fin</label>
                                                                <div class="col-md-6">
                                                                    <input type="date" name="date_fin" class="form-control" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="custom-select d-block w-100" name="heure_fin" id="pickup-time">
                                                                        <option value="00:00">00:00</option>
                                                                        <option value="00:30">00:30</option>
                                                                        <option value="01:00">01:00</option>
                                                                        <option value="01:30">01:30</option>
                                                                        <option value="02:00">02:00</option>
                                                                        <option value="02:30">02:30</option>
                                                                        <option value="03:00">03:00</option>
                                                                        <option value="03:30">03:30</option>
                                                                        <option value="04:00">04:00</option>
                                                                        <option value="04:30">04:30</option>
                                                                        <option value="05:00">05:00</option>
                                                                        <option value="05:30">05:30</option>
                                                                        <option value="06:00">06:00</option>
                                                                        <option value="06:30">06:30</option>
                                                                        <option value="07:00">07:00</option>
                                                                        <option value="07:30">07:30</option>
                                                                        <option value="08:00">08:00</option>
                                                                        <option value="08:30">08:30</option>
                                                                        <option value="09:00">09:00</option>
                                                                        <option value="09:30">09:30</option>
                                                                        <option value="10:00" selected>10:00</option>
                                                                        <option value="10:30">10:30</option>
                                                                        <option value="11:00">11:00</option>
                                                                        <option value="11:30">11:30</option>
                                                                        <option value="12:00">12:00</option>
                                                                        <option value="12:30">12:30</option>
                                                                        <option value="13:00">13:00</option>
                                                                        <option value="13:30">13:30</option>
                                                                        <option value="14:00">14:00</option>
                                                                        <option value="14:30">14:30</option>
                                                                        <option value="15:00">15:00</option>
                                                                        <option value="15:30">15:30</option>
                                                                        <option value="16:00">16:00</option>
                                                                        <option value="16:30">16:30</option>
                                                                        <option value="17:00">17:00</option>
                                                                        <option value="17:30">17:30</option>
                                                                        <option value="18:00">18:00</option>
                                                                        <option value="18:30">18:30</option>
                                                                        <option value="19:00">19:00</option>
                                                                        <option value="19:30">19:30</option>
                                                                        <option value="20:00">20:00</option>
                                                                        <option value="20:30">20:30</option>
                                                                        <option value="21:00">21:00</option>
                                                                        <option value="21:30">21:30</option>
                                                                        <option value="22:00">22:00</option>
                                                                        <option value="22:30">22:30</option>
                                                                        <option value="23:00">23:00</option>
                                                                        <option value="23:30">23:30</option>
                                                                    </select>
                                                                </div>
                                                            </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <h4 class="headrer-title">Période de location</h4>
                                <div class="table-responsive">
                                    <table class="table" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Départ</strong>
                                                <div class="float-right">{{$reservation->start_point. ' le '.$reservation->departure_date.' a '.$reservation->departure_time}}</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Vol </strong>
                                                <div class="float-right">
                                                    Aucun numéro de vol disponible
                                                </div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="float-left">Retour</strong><div class="float-right">{{$reservation->end_point. ' le '.$reservation->return_date.' a '.$reservation->return_time}}</div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="float-left">Nombre de jours de location</strong><div class="float-right">
                                                {{$reservation->days}} Jours</div></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <h4 class="headrer-title">Informations Conducteur</h4>
                                <div class="table-responsive">
                                    <table class="table" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Nom complet</strong>
                                                <div class="float-right">{{$reservation->fname . ' ' . $reservation->lname}}</div>
                                            </td>
                                            <td>
                                                <strong class="float-left">Date de naissance</strong>
                                                <div class="float-right">{{$reservation->dob}}</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Permis</strong>
                                                <div class="float-right">{{$reservation->dob}}</div>
                                            </td>
                                            <td>
                                                <strong class="float-left">Lieu de naissance</strong>
                                                <div class="float-right">{{$reservation->place_of_birth}}</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Lieu de délivrance </strong>
                                                <div class="float-right">{{$reservation->permit_place}}</div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Date délivrance</strong>
                                                <div class="float-right">{{$reservation->permit_issue}}</div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card 2 -->
            </div>

        </div>
@endsection
