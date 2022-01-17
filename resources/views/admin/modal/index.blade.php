@extends('layouts.app')
@push('pg_btn')
    <button type="button" data-toggle="modal" data-target="#create_cat" class="btn btn-sm btn-neutral">Ajouter une nouvelle Modèle</button>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            Toutes les Modèles
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="modal fade" id="create_cat">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Modèle</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('modal.store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Marque</label>
                                                    <select name="marque_id" required class="form-control" id="">
                                                        @foreach($marque as $mar)
                                                        <option value="{{$mar->id}}">{{$mar->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nom de la Modèle</label>
                                                    <input type="text" class="form-control" id="category_name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Taper la Modèle</label>
                                                    <select name="type" class="form-control" id="">
                                                        @foreach($typevehicle as $typeve)
                                                            <option value="{{$typeve->name}}">{{$typeve->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <table class="table table-hover align-items-center" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MARQUE</th>
                                    <th scope="col">MODÈLE</th>
                                    <th scope="col">TYPE OF VEHICLE</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($modal as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->marque->name??'Supprimé'}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->type}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modele{{$row->id}}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="modele{{$row->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modification du modèle : {{$row->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('modal.update', ['id' => $row->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="name" class="col-form-label">Nom du modèle</label>
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{$row->name}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="marque_id" class="col-form-label">Marque</label>
                                                                        <select name="marque_id" id="marque_id" class="form-control">
                                                                            @foreach($marque as $marq)
                                                                                <option value="{{$marq->id}}" @if($marq->id == $row->marque_id) selected @endif>{{$marq->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="categorie_id" class="col-form-label">Catégorie</label>
                                                                        <select name="type" id="categorie_id" class="form-control">
                                                                            @foreach($typevehicle as $type)
                                                                                <option value="{{$type->name}}" @if($type->name == $row->type) selected @endif>{{$type->name}}</option>
                                                                            @endforeach
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
                                            <a  class="btn btn-danger btn-sm m-1" id="delete" href="{{route('modal.delete', ['id' => $row->id])}}">
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
