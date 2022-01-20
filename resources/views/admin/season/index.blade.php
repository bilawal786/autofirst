@extends('layouts.app')
@push('pg_btn')
    <button type="button" data-toggle="modal" data-target="#create_cat" class="btn btn-sm btn-neutral">Ajouter une nouvelle Saison</button>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            Toutes les Saisons
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="modal fade" id="create_cat">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Saison</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('season.store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">VÉHICULE CATÉGORIE</label>
                                                    <select name="category_id" required class="form-control" id="">
                                                        @foreach($categories as $mar)
                                                            <option value="{{$mar->id}}">{{$mar->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nom de la Season</label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Date de début</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Date de fin</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Prix par jour</label>
                                                    <input type="number" class="form-control" id="price" name="price" required>
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
                                    <th scope="col">CATÉGORIE</th>
                                    <th scope="col">SAISON NOM</th>
                                    <th scope="col">DATE DE DÉBUT</th>
                                    <th scope="col">DATE DE FIN</th>
                                    <th scope="col">PRIX</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($seasons as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->category->name??'Supreme'}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->start_date}}</td>
                                        <td>{{$row->end_date}}</td>
                                        <td>{{$row->price}} €</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modele{{$row->id}}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="modele{{$row->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modification du saaison : {{$row->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('season.update', ['id' => $row->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="name" class="col-form-label">Nom du saison</label>
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{$row->name}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="marque_id" class="col-form-label">Véhicule</label>
                                                                        <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                                            @foreach($categories as $marq)
                                                                                <option value="{{$marq->id}}" @if($marq->id == $row->category_id) selected @endif>{{$marq->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="marque_id" class="col-form-label">Date de début</label>
                                                                        <input type="date" class="form-control" name="start_date" value="{{$row->start_date}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="marque_id" class="col-form-label">Date de fin</label>
                                                                        <input type="date" class="form-control" name="end_date" value="{{$row->end_date}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="price" class="col-form-label">Prix ​​par jour</label>
                                                                        <input type="number" class="form-control" name="price" value="{{$row->price}}">
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
                                            <a  class="btn btn-danger btn-sm m-1" id="delete" href="{{route('season.delete', ['id' => $row->id])}}">
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
