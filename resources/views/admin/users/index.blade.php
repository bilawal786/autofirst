@extends('layouts.app')
@push('pg_btn')
    <button type="button" data-toggle="modal" data-target="#create_cat" class="btn btn-sm btn-neutral">Ajouter une nouvelle utilisateur</button>
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
                            Toutes les Utilisateurs
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="modal fade" id="create_cat">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Utilisateurs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('users.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Nom complet</label>
                                                        <input type="text" class="form-control" id="name" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Email</label>
                                                        <input type="email" class="form-control" id="name" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Telephone</label>
                                                        <input type="number" class="form-control" id="name" name="phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Photo</label>
                                                        <input type="file" class="form-control" id="name" name="photo" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Mot de passe</label>
                                                        <input type="password" class="form-control" id="name" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="reservation" value="1" class="custom-control-input" id="reservation">
                                                            <label for="reservation" class="custom-control-label">Réservations</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="sale_counter" value="1" class="custom-control-input" id="sale-counter">
                                                            <label for="sale-counter" class="custom-control-label">Comptoir de vente</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="marque" value="1" class="custom-control-input" id="marque">
                                                            <label for="marque" class="custom-control-label">Marque</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="category" value="1" class="custom-control-input" id="category">
                                                            <label for="category" class="custom-control-label">Catégorie</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="modals" value="1" class="custom-control-input" id="modals">
                                                            <label for="modals" class="custom-control-label">Modals</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="add_vehicles" value="1" class="custom-control-input" id="add_vehicles">
                                                            <label for="add_vehicles" class="custom-control-label">Ajouter des véhicules</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="view_vehicles" value="1" class="custom-control-input" id="view_vehicles">
                                                            <label for="view_vehicles" class="custom-control-label">Voir les véhicules</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="options" value="1" class="custom-control-input" id="options">
                                                            <label for="options" class="custom-control-label">Options</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="gurante" value="1" class="custom-control-input" id="gurante">
                                                            <label for="gurante" class="custom-control-label">Garanties</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="seasons" value="1" class="custom-control-input" id="seasons">
                                                            <label for="seasons" class="custom-control-label">Saisons & Tarifs</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="website" value="1" class="custom-control-input" id="website">
                                                            <label for="website" class="custom-control-label">Paramètres du site Web</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group p-2 d-inline-block">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="users" value="1" class="custom-control-input" id="users">
                                                            <label for="users" class="custom-control-label">Utilisateurs</label>
                                                        </div>
                                                    </div>
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
                                    <th scope="col">NOM COMPLET	</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHOTO</th>
                                    <th scope="col">TELEPHONE</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($users as $row)
                                    <tr>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td><img src="{{asset($row->photo)}}" height="50px" alt=""></td>
                                        <td>{{$row->phone}}</td>
                                        <td>
<!--                                            <button type="button" data-toggle="modal" data-target="#modele{{$row->id}}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="modele{{$row->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modification du Utilisateurs : {{$row->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('users.update', ['id' => $row->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Full Name</label>
                                                                            <input type="text" class="form-control" value="{{$row->name}}" id="name" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Email</label>
                                                                            <input type="email" readonly class="form-control" value="{{$row->email}}" id="name" name="email" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Telephone</label>
                                                                            <input type="number" class="form-control" value="{{$row->phone}}" id="name" name="phone" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name" class="col-form-label">Photo</label>
                                                                            <input type="file" class="form-control" id="name" name="photo">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="reservation" {{$row->reservation == 1 ? 'checked':''}} value="1" class="custom-control-input" id="reservation">
                                                                                <label for="reservation" class="custom-control-label">Réservations</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="sale_counter" {{$row->sale_counter == 1 ? 'checked':''}} value="1" class="custom-control-input" id="sale-counter">
                                                                                <label for="sale-counter" class="custom-control-label">Comptoir de vente</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="marque" {{$row->marque == 1 ? 'checked':''}} value="1" class="custom-control-input" id="marque">
                                                                                <label for="marque" class="custom-control-label">Marque</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="category" {{$row->category == 1 ? 'checked':''}} value="1" class="custom-control-input" id="category">
                                                                                <label for="category" class="custom-control-label">Catégorie</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="modals" {{$row->modals == 1 ? 'checked':''}} value="1" class="custom-control-input" id="modals">
                                                                                <label for="modals" class="custom-control-label">Modals</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="add_vehicles" {{$row->add_vehicles == 1 ? 'checked':''}} value="1" class="custom-control-input" id="add_vehicles">
                                                                                <label for="add_vehicles" class="custom-control-label">Ajouter des véhicules</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="view_vehicles" {{$row->view_vehicles == 1 ? 'checked':''}} value="1" class="custom-control-input" id="view_vehicles">
                                                                                <label for="view_vehicles" class="custom-control-label">Voir les véhicules</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="options" {{$row->options == 1 ? 'checked':''}} value="1" class="custom-control-input" id="options">
                                                                                <label for="options" class="custom-control-label">Options</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="gurante" {{$row->gurante == 1 ? 'checked':''}} value="1" class="custom-control-input" id="gurante">
                                                                                <label for="gurante" class="custom-control-label">Garanties</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="seasons" {{$row->seasons == 1 ? 'checked':''}} value="1" class="custom-control-input" id="seasons">
                                                                                <label for="seasons" class="custom-control-label">Saisons & Tarifs</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="website" {{$row->website == 1 ? 'checked':''}} value="1" class="custom-control-input" id="website">
                                                                                <label for="website" class="custom-control-label">Paramètres du site Web</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group p-2 d-inline-block">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="users" {{$row->users == 1 ? 'checked':''}} value="1" class="custom-control-input" id="users">
                                                                                <label for="users" class="custom-control-label">Utilisateurs</label>
                                                                            </div>
                                                                        </div>
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
                                            </div>-->
                                            @if($row->id != 1)
                                            <a  class="btn btn-danger btn-sm m-1" id="delete" href="{{route('users.delete', ['id' => $row->id])}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                             @endif
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
