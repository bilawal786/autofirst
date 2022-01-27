@extends('layouts.app')
@push('pg_btn')
@endpush
@section('content')
    <style>.table.spec td {
            border-top: none !important;
            text-align: left !important;
            font-size: 0.87rem;
        }

        td, th {
            text-align: left !important
        }
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
                                            <strong class="bold">Nom
                                                :</strong> {{$reservation->fname}} {{$reservation->lname}}
                                        </td>
                                        <td scope="row">
                                            <strong class="bold">Email :</strong> {{$reservation->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <strong class="bold">Adresse :</strong> {{$reservation->address}}
                                            , {{$reservation->postal_code}} {{$reservation->city}}
                                            - {{$reservation->country}}
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
                                            <strong class="bold">Véhicule
                                                :</strong> {{$reservation->vehicle->marque->name??''}} {{$reservation->vehicle->modal->name??''}}
                                            - {{$reservation->vehicle->registration??""}}
                                        </td>
                                        <td scope="row">
                                            <strong class="bold">Nb de personne
                                                :</strong> {{$reservation->adults.' adultes'}}
                                            - {{$reservation->children.' enfants'}}- {{$reservation->babies.' bébé(s)'}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <a style="margin:auto;color: white;"
                                       href="{{route('contract.create', ['id' => $reservation->id])}}"
                                       class="btn btn-effect-ripple btn-xs btn-info" target="_blank">Voir le Contrat</a>
                                    <a style="margin:auto;color: white;"
                                       href="{{route('invoice.create', ['id' => $reservation->id])}}"
                                       class="btn btn-effect-ripple btn-xs btn-success" target="_blank">Voir la
                                        Facture</a>
                                    <a style="margin:auto;color: white;" id="btn-resa-delete" data-toggle="modal"
                                       data-target="#modalSuppressionResaT{{$reservation->id}}" title="Suppression"
                                       class="btn btn-effect-ripple btn-xs btn-danger">Supprimer</a>
                                    <div class="modal fade" id="modalSuppressionResaT{{$reservation->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="modalSuppressionResaT{{$reservation->id}}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                             role="document">
                                            <div class="modal-content bg-gradient-danger">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modal-title-notification">
                                                        Confirmation</h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('delete.reservation', $reservation->id)}}"
                                                          method="get" class="form-horizontal form-bordered">
                                                        @csrf
                                                        <div class="py-3 text-center">
                                                            <i class="ni ni-bell-55 ni-3x"></i>
                                                            <h4 class="heading mt-4"></h4>
                                                            <p>Voulez-vous vraiment supprimer cette reservation ?</p>
                                                            <p>Cette action est irreversible.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Valider
                                                            </button>
                                                            <button class="btn btn-secondary" data-dismiss="modal">
                                                                Fermer
                                                            </button>
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
                                                <div
                                                    class="float-right">{{$reservation->start->name. ' le '.$reservation->departure_date.' a '.$reservation->departure_time}}</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Vol </strong>
                                                <div class="float-right">
                                                    {{$reservation->flight_no??'Aucun numéro de vol disponible'}}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="float-left">Retour</strong>
                                                <div
                                                    class="float-right">{{$reservation->end->name. ' le '.$reservation->return_date.' a '.$reservation->return_time}}</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="float-left">Nombre de jours de location</strong>
                                                <div class="float-right">
                                                    {{$reservation->days}} Jours
                                                </div>
                                            </td>
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
                                                <div
                                                    class="float-right">{{$reservation->fname . ' ' . $reservation->lname}}</div>
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
                @if($reservation->options)
                <div class="col-12 col-md-6">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <h4 class="headrer-title">Informations Options</h4>
                                <div class="table-responsive">
                                    <table class="table" style="text-align:center">
                                        <tbody>
                                        <?php
                                        $op = json_decode($reservation->options);
                                        ?>
                                        @foreach(json_decode($reservation->options_id) as $key => $item)
                                            <?php
                                            $option = \App\Option::find($item);
                                            ?>
                                            <tr>
                                                <td>
                                                  {{$option->name}}
                                                </td>
                                                <td>
                                                  {{$op[$key]}}
                                                </td>
    {{--                                            <td>--}}
    {{--                                                {{$option->price * $op[$key]}} €--}}
    {{--                                            </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($reservation->gurantee)
                <div class="col-12 col-md-6">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <h4 class="headrer-title">Informations Garantie</h4>
                                <div class="table-responsive">
                                    <table class="table" style="text-align:center">
                                        <tbody>
                                        <?php
                                        $op = json_decode($reservation->gurantee);
                                        ?>
                                        @foreach(json_decode($reservation->gurantee_id) as $key => $item)
                                            <?php
                                            $option = \App\Gurantee::find($item);
                                            ?>
                                        <tr>
                                            <td>
                                              {{$option->name}}
                                            </td>
                                            <td>
                                              {{$op[$key]}}
                                            </td>
{{--                                            <td>--}}
{{--                                                {{$option->price * $op[$key]}} €--}}
{{--                                            </td>--}}
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12 col-md-12">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <div class="table-responsive">
                                    <h4 class="headrer-title">Transactions</h4>
                                    <table class="table" style="text-align:left">
                                        <thead>
                                        <tr>
                                            <!--<th>#</th>-->
                                            <th>Méthode de paiement</th>
                                            <th>Numéro de transaction</th>
                                            <th>Montant</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <!--<th scope="row">1</th>-->
                                            <td>Espèces</td>
                                            <td>{{$reservation->payment_method}}</td>
                                            <td>{{$reservation->totalamount}} €</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="block">
                                <div class="table-responsive">
                                    <h4 class="headrer-title"> Montant total</h4>
                                    <table class="table" style="text-align:left">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Montant la réservation</strong>
                                                <div class="float-right">{{$reservation->totalamount}}.00 €</div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="float-left">Solde</strong>
                                                <div class="float-right">0 €</div>
                                            </td>
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
