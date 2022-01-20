@extends('layouts.app')
@push('pg_btn')
    <a href="{{ route('vehicle.create') }}" class="btn btn-sm btn-neutral">Ajouter un véhicule</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">Véhicules</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Immatriculation</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Modèle</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">État</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($vehicles as $vehicule)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{asset($vehicule->image)}}" width="120">
                                        </th>
                                        <td class="budget">
                                            {{$vehicule->registration}}
                                        </td>
                                        <td>
                                            {{$vehicule->marque->name??'Supprimé'}}
                                        </td>
                                        <td>
                                            {{$vehicule->modal->name??'Supprimé'}}
                                        </td>
                                        <td>
                                            {{$vehicule->categorie->name??'Supprimé'}}
                                        </td>
                                        <td>
                                            @if($vehicule->status == '2')
                                                <div class="badge badge-pill badge-warning">Archivé</div>
                                            @elseif($vehicule->status == '0')
                                                <div class="badge badge-pill badge-danger">Non publié</div>
                                            @else
                                                <div class="badge badge-pill badge-primary">En ligne</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#vehiccule{{$vehicule->id}}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="vehiccule{{$vehicule->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modification du véhicule : {{$vehicule->registration}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('update.vehicule', $vehicule->id)}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="immatriculation" class="col-form-label">Immatriculation</label>
                                                                    <input type="text" class="form-control" id="registration" name="registration" value="{{$vehicule->registration}}">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="date_mise_service" class="col-form-label">Date mise en service</label>
                                                                        <input type="date" class="form-control" id="date_mise_service" name="acqui_date" value="{{$vehicule->acqui_date}}" disabled>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="date_mise_service" class="col-form-label">Date mise en location</label>
                                                                        <input type="date" class="form-control" id="date_mise_service" name="rental_date" value="{{$vehicule->rental_date}}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="franchise" class="col-form-label">Franchise</label>
                                                                        <input type="text" class="form-control" id="franchise" name="franchise" value="{{$vehicule->franchise}}">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="color" class="col-form-label">Couleur planning</label>
                                                                        <input type="color" class="form-control" id="color" name="color" value="{{$vehicule->color}}">
                                                                    </div>
<!--                                                                    <div class="form-group col-md-6">
                                                                        <label for="color" class="col-form-label">Prix par jour</label>
                                                                        <input type="number" class="form-control" id="rate_per_day" name="rate_per_day" value="{{$vehicule->rate_per_day}}">
                                                                    </div>-->
                                                                    <div class="form-group col-md-6">
                                                                        <label for="color" class="col-form-label">Image</label>
                                                                        <input type="file" class="form-control" id="image" name="image">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="color" class="col-form-label">Statut</label>
                                                                        <select name="status" class="form-control" id="">
                                                                            @if($vehicule->status == 1)
                                                                            <option value="1">Activer</option>
                                                                            <option value="0">Désactiver</option>
                                                                            @else
                                                                                <option value="0">Désactiver</option>
                                                                                <option value="1">Activer</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Valider</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a  class="btn btn-danger btn-sm m-1" id="delete" href="{{route('vehicle.delete', $vehicule->id)}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
