@extends('layouts.app')
@push('pg_btn')
    <button type="button" data-toggle="modal" data-target="#create_cat" class="btn btn-sm btn-neutral">Ajouter une
        nouvelle Point de Livraison
    </button>
@endpush
<style>
    .modal-dialog {
        max-width: 800px !important;
        margin: 1.75rem auto;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            Toutes les Point de Livraison
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="modal fade" id="create_cat">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Point de Livraison</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('agency.store')}}" method="post" accept-charset="UTF-8"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Nom</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Téléphone</label>
                                                        <input type="text" class="form-control" id="name" name="phone"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Adresse</label>
                                                        <input type="text" class="form-control" id="name" name="address"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Complément d'adresse</label>
                                                        <input type="text" class="form-control" id="name" name="c_address"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Ville</label>
                                                        <input type="text" class="form-control" id="name" name="city"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Tarif livraison</label>
                                                        <input type="text" class="form-control" id="name" name="price"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fermer
                                            </button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <table class="table table-hover align-items-center" data-toggle="table" data-search="true"
                                   data-show-columns="true" data-pagination="true">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">NOM</th>
                                    <th scope="col">TELEPHONE</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Tarif</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($agency as $row)
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->city}}</td>
                                        <td>{{$row->price}} €</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modele{{$row->id}}"
                                                    class="btn btn-info btn-sm m-1"><i class="fas fa-edit"
                                                                                       aria-hidden="true"></i></button>
                                            <div class="modal fade" id="modele{{$row->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modification du Utilisateurs
                                                                : {{$row->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('agency.update', ['id' => $row->id])}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Nom</label>
                                                                            <input type="text" class="form-control" value="{{$row->name}}" id="name" name="name"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Téléphone</label>
                                                                            <input type="text" class="form-control" value="{{$row->phone}}" id="name" name="phone"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Adresse</label>
                                                                            <input type="text" class="form-control" value="{{$row->address}}" id="name" name="address"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Complément d'adresse</label>
                                                                            <input type="text" class="form-control" id="name" value="{{$row->c_address}}" name="c_address"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Ville</label>
                                                                            <input type="text" class="form-control" value="{{$row->city}}" id="name" name="city"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Tarif livraison</label>
                                                                            <input type="text" class="form-control" value="{{$row->price}}" id="name" name="price"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Valider
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <a class="btn btn-danger btn-sm m-1" id="delete"
                                                   href="{{route('agency.delete', ['id' => $row->id])}}">
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
