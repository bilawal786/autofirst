@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('admin.vehicles')}}" class="btn btn-sm btn-neutral">Toutes la flotte</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <form action="{{route('vehicle.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Information du véhicule</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="marque_id">Marque</label>
                                        <select onchange="marquechange(this)" name="marque_id" id="marque_id" class="form-control action" required>
                                            <option value="">- Choisir une marque -</option>
                                            @foreach($marques as $marque)
                                                <option value="{{$marque->id}}">{{$marque->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 step2">
                                    <div class="form-group step2">
                                        <label class="form-control-label" for="modal_id">Modèle</label>
                                        <select name="modal_id" class="form-control modals" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Immatriculation</label>
                                        <input type="text" class="form-control" name="registration" id="registration" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Franchise</label>
                                        <input type="text" class="form-control" name="franchise" id="franchise" autocomplete="false" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Date acquisition</label>
                                        <input type="date" class="form-control" name="acqui_date" id="acqui_date" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Date mise en location</label>
                                        <input type="date" class="form-control" name="rental_date" id="rental_date" autocomplete="false" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Couleur</label>
                                        <input type="color" class="form-control" name="color" id="color" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="color" required="">
                                    </div>
                                </div>
<!--                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Prix par jour</label>
                                        <input type="number" class="form-control" name="rate_per_day" id="color" autocomplete="false" required="">
                                    </div>
                                </div>-->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Catégorie</label>
                                        <select name="category" class="form-control" id="">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        function marquechange(elem){
            $('.modals').html('<option value="">- Choisir une modele -</option>');
            event.preventDefault();
            let id = elem.value;
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{route('fetchmodals')}}",
                type:"POST",
                data:{
                    id:id,
                    _token: _token
                },
                success:function(response){
                    console.log(response);
                    $.each(response, function(i, item) {
                        $('.modals').append('<option value="'+item.id+'">'+item.name+'</option>');
                    });
                },
            });
        }
    </script>
@endpush
