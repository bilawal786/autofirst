@extends('layouts.front')
@section('content')

    <div class="section-padding contact-form-map">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="section-header style-left">
                        <div class="section-heading">
                            <h3 class="text-custom-black">Entrer en contact</h3>
                            <div class="section-description">
                            </div>
                        </div>
                    </div>
                    <form class="mb-md-80">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="#" class="form-control form-control-custom" placeholder="Nom" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="#" class="form-control form-control-custom" placeholder="Email I'd" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="#" class="form-control form-control-custom" placeholder="Sujette" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="#" class="form-control form-control-custom" placeholder="Téléphone." required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" rows="5" class="form-control form-control-custom" placeholder="Message" required=""></textarea>
                                </div>
                                <button type="submit" class="btn-first btn-submit">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
