@extends('layouts.app')
@push('pg_btn')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="mb-0">Options</h3>
                        </div>
                        <div class="col-lg-5 text-right">
                            <button type="button" data-toggle="modal" data-target="#create_option" class="btn btn-sm btn-neutral">Ajouter une Option</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center" data-toggle="table" data-search="true" data-pagination="true">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Visuel</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                <div class="modal fade" id="create_option">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Option</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('option.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="nom" class="col-form-label">Nom</label>
                                                            <input type="text" class="form-control" id="name" name="name">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="code" class="col-form-label">Code</label>
                                                            <input type="text" class="form-control" id="code" name="code">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="description" class="col-form-label">Description</label>
                                                            <textarea class="form-control" id="description" name="description"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="img_url" class="col-form-label">Image</label>
                                                            <input type="file" class="form-control" id="img_url" name="image">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="prix_par_jour" class="col-form-label">Prix</label>
                                                            <input type="number" class="form-control" id="price" name="price">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="nb_max_par_reservation" class="col-form-label">Nombre max par réservation</label>
                                                            <input type="number" class="form-control" id="max_input" name="max_input">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="status" class="col-form-label">État</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="1">Activer</option>
                                                                <option value="0">Désactiver</option>
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
                                @foreach($options as $option)
                                    <tr>
                                        <td class="budget">
                                            <img src="{{asset($option->image)}}" alt="" style="width: 80px">
                                        </td>
                                        <td class="budget">
                                            {{$option->name}}
                                        </td>
                                        <td>
                                            {{$option->code}}
                                        </td>
                                        <th scope="row">
                                            {{\Illuminate\Support\Str::limit($option->description, 50)}}
                                        </th>
                                        <td>
                                            @if($option->status == '1')
                                                <i class="fas fa-check-circle" style="color: green;font-size: 16px" title=""></i>
                                            @else
                                                <i class="fas fa-times-circle" style="color: red;font-size: 16px" title=""></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" data-toggle="modal" data-target="#option_{{$option->id}}" class="btn btn-info btn-sm m-1"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="option_{{$option->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier {{$option->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('option.update', $option->id)}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="nom" class="col-form-label">Nom</label>
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{$option->name}}">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="code" class="col-form-label">Code</label>
                                                                        <input type="text" class="form-control" id="code" name="code" value="{{$option->code}}">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="description" class="col-form-label">Description</label>
                                                                        <textarea class="form-control" id="description" name="description">{{$option->description}}</textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="img_url" class="col-form-label">Image</label>
                                                                        <input type="file" name="image" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="prix_par_jour" class="col-form-label">Prix</label>
                                                                        <input type="number" class="form-control" id="price" name="price" value="{{$option->price}}">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="nb_max_par_reservation" class="col-form-label">Nombre max par réservation</label>
                                                                        <input type="number" class="form-control" id="max_input" name="max_input" value="{{$option->max_input}}">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="status" class="col-form-label">État</label>
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option value="1" @if($option->status == "1") selected @endif>Activer</option>
                                                                            <option value="0" @if($option->status == "0") selected @endif>Désactiver</option>
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
                                            <button type="button"  data-toggle="modal" data-target="#deleteOption_{{$option->id}}" class="btn delete btn-danger btn-sm m-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="deleteOption_{{$option->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Suppression {{$option->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('option.delete', $option->id)}}" method="post">
                                                            @csrf
                                                            <div class="py-3 text-center">
                                                                <i class="ni ni-bell-55 ni-2x"></i>
                                                                <h4 class="heading mt-4"></h4>
                                                                <p>Etes vous sur le vouloir supprimer l'option {{$option->name}} ?</p>
                                                                <p>Cette action est irreversible.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="option_name" value="{{$option->name}}">
                                                                <input type="hidden" name="option_id" value="{{$option->id}}">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Valider</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
