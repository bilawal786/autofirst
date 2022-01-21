@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <form action="{{route('content.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Paramètres du site Web</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo</label>
                                        <input type="file" class="form-control" name="logo" id="registration" autocomplete="false">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Facebook</label>
                                        <input type="url" class="form-control" name="facebook" id="franchise" value="{{$content->facebook}}" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Instagram</label>
                                        <input type="url" class="form-control" name="instagram" id="franchise" value="{{$content->instagram}}" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="franchise" value="{{$content->phone}}" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="franchise" value="{{$content->email}}" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Address</label>
                                        <input type="text" class="form-control" name="address" id="franchise" value="{{$content->address}}" autocomplete="false" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Footer Text</label>
                                        <input type="text" class="form-control" name="footer" id="franchise" value="{{$content->footer}}" autocomplete="false" required="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Image du curseur 1</label>
                                        <input type="file" class="form-control" name="image1" id="franchise" autocomplete="false">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Image du curseur 2</label>
                                        <input type="file" class="form-control" name="image2" id="franchise" autocomplete="false">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">À propos de nous</label>
                                        <input type="text" class="form-control" name="h1" id="franchise" value="{{$content->h1}}" autocomplete="false" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Image</label>
                                        <input type="file" class="form-control" name="image3" id="franchise" autocomplete="false">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Description</label>
                                        <textarea name="d1" id="summernote" class="form-control" required cols="30" rows="10">{{$content->d1}}</textarea>
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
