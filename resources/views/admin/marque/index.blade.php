@extends('layouts.app')
@push('pg_btn')
    <button type="button" data-toggle="modal" data-target="#create_cat" class="btn btn-sm btn-neutral">Ajouter une nouvelle marque</button>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            Toutes les marques
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="modal fade" id="create_cat">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une marque</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('marque.store')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nom de la marque</label>
                                                    <input type="text" class="form-control" id="category_name" name="name" required>
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($marque as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                <a id="delete" class="btn btn-danger btn-sm m-1" href="{{route('marque.delete', ['id' => $row->id])}}">
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
