@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <!-- end page title end breadcrumb -->
            <div class="card" style="margin-bottom: 20px;">
                <h3 style="text-align: center">Total Price  : <b id="total">0</b> €</h3>
                <div class="card-body">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Date & lieux reservation</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Choix du Vehicule</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Choix des Options</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-4"  type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                <p>Choix des Garanties</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                <p>Infos Client</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form role="form" action="{{route('reservation.store')}}" method="POST">
                                @csrf
                                <div class="setup-content" id="step-1">
                                    <div class="container">
                                        <h2 class="fs-title">Date & lieux reservation</h2>
                                        <h6>Choisissez vos lieux de prise en charge:</h6>
                                        <h3 class="title-blue">Départ</h3>
                                        <hr class="m-t-0 m-b-30">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Agence de départ</label>
                                                    <div class="input-group">
                                                        <select class="form-control custom-select d-block w-100" id="lieu_depart" name="start_point" onchange="document.getElementById('lieu_retour').value = this.value;" required>
                                                                <option value="Aéroport Pôle Caraïbes">Aéroport Pôle Caraïbes</option>
                                                                <option value="Agence Baie-Mahault">Agence Baie-Mahault</option>
                                                                <option value="Agence Sainte-Anne">Agence Sainte-Anne</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Date de départ</label>
                                                    <div class="input-group">
                                                        <input class="form-control datepicker" name="date_depart" id="departure_date" data-value="<?= date("Y-m-d") ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Heure de départ :</label>
                                                    <div class="input-group">
                                                        <select class="form-control custom-select d-block w-100" name="departure_time" id="time_depart" onchange="document.getElementById('time_retour').value = this.value;" required>
                                                            <option value="06:00">06:00</option>
                                                            <option value="06:30">06:30</option>
                                                            <option value="07:00">07:00</option>
                                                            <option value="07:30">07:30</option>
                                                            <option value="08:00">08:00</option>
                                                            <option value="08:30">08:30</option>
                                                            <option value="09:00">09:00</option>
                                                            <option value="09:30">09:30</option>
                                                            <option value="10:00">10:00</option>
                                                            <option value="10:30">10:30</option>
                                                            <option value="11:00">11:00</option>
                                                            <option value="11:30">11:30</option>
                                                            <option value="12:00">12:00</option>
                                                            <option value="12:30">12:30</option>
                                                            <option value="13:00">13:00</option>
                                                            <option value="13:30">13:30</option>
                                                            <option value="14:00">14:00</option>
                                                            <option value="14:30">14:30</option>
                                                            <option value="15:00">15:00</option>
                                                            <option value="15:30">15:30</option>
                                                            <option value="16:00">16:00</option>
                                                            <option value="16:30">16:30</option>
                                                            <option value="17:00">17:00</option>
                                                            <option value="17:30">17:30</option>
                                                            <option value="18:00">18:00</option>
                                                            <option value="18:30">18:30</option>
                                                            <option value="19:00">19:00</option>
                                                            <option value="19:30">19:30</option>
                                                            <option value="20:00">20:00</option>
                                                            <option value="20:30">20:30</option>
                                                            <option value="21:00">21:00</option>
                                                            <option value="21:30">21:30</option>
                                                            <option value="22:00">22:00</option>
                                                            <option value="22:30">22:30</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="title-blue">Retour</h3>
                                        <hr class="m-t-0 m-b-30">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label" name="lieu_retour_id">Agence de retour</label>
                                                    <div class="input-group">
                                                        <select class="form-control custom-select d-block w-100" id="lieu_retour" name="end_point" required>
                                                            <option value="Aéroport Pôle Caraïbes">Aéroport Pôle Caraïbes</option>
                                                            <option value="Agence Baie-Mahault">Agence Baie-Mahault</option>
                                                            <option value="Agence Sainte-Anne">Agence Sainte-Anne</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Date de retour</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control datepicker" name="date_retour" id="date_fin" data-value="<?= date("Y-m-d ",strtotime("+3 days")) ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Heure de retour :</label>
                                                    <div class="input-group">
                                                        <select class="form-control custom-select d-block w-100" name="return_time" id="time_retour" required>
                                                            <option value="06:00">06:00</option>
                                                            <option value="06:30">06:30</option>
                                                            <option value="07:00">07:00</option>
                                                            <option value="07:30">07:30</option>
                                                            <option value="08:00">08:00</option>
                                                            <option value="08:30">08:30</option>
                                                            <option value="09:00">09:00</option>
                                                            <option value="09:30">09:30</option>
                                                            <option value="10:00">10:00</option>
                                                            <option value="10:30">10:30</option>
                                                            <option value="11:00">11:00</option>
                                                            <option value="11:30">11:30</option>
                                                            <option value="12:00">12:00</option>
                                                            <option value="12:30">12:30</option>
                                                            <option value="13:00">13:00</option>
                                                            <option value="13:30">13:30</option>
                                                            <option value="14:00">14:00</option>
                                                            <option value="14:30">14:30</option>
                                                            <option value="15:00">15:00</option>
                                                            <option value="15:30">15:30</option>
                                                            <option value="16:00">16:00</option>
                                                            <option value="16:30">16:30</option>
                                                            <option value="17:00">17:00</option>
                                                            <option value="17:30">17:30</option>
                                                            <option value="18:00">18:00</option>
                                                            <option value="18:30">18:30</option>
                                                            <option value="19:00">19:00</option>
                                                            <option value="19:30">19:30</option>
                                                            <option value="20:00">20:00</option>
                                                            <option value="20:30">20:30</option>
                                                            <option value="21:00">21:00</option>
                                                            <option value="21:30">21:30</option>
                                                            <option value="22:00">22:00</option>
                                                            <option value="22:30">22:30</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="days" name="days">
                                        <button class="btn btn-primary nextBtn btn-block pull-right" onclick="calc0()" type="button">Choisir un véhicule</button>
                                    </div>
                                </div>
                                <div class="setup-content" id="step-2">
                                    <div class="card-body veh">
                                        <div class="row">
                                            <div id="loader" class="lds-dual-ring hidden overlay"></div>
                                            <div id="responses" class="custom_card responses">

                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-block pull-right" type="button" onclick="calc1()">Choisir les options</button>
                                </div>
                                <div class="setup-content" id="step-3">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-centered table-hover mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>Titre</th>
                                                                <th>Prix</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($options as $option)
                                                                <tr>
                                                                    <td>
                                                                        <h3>{{$option->name}}</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>
                                                                            {{$option->price}} €
                                                                        </h3>
                                                                    </td>
                                                                    <td>
                                                                        <div class="quantity">
                                                                            <input type="number" onchange="addoptions(this)" name="options[]" data-id="{{$option->id}}" data-input="{{$option->max_input}}" min="0" data-price{{$option->id}}="{{$option->price}}" max="{{$option->max_input}}" step="1" value="0" class="qty">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <input type="hidden" name="options_id[]" value="{{$option->id}}">
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="display: none">
                                            <div id="flotterOption">
                                                <h2 class="fs-title">Selection</h2>
                                                <hr>
                                                <li style="list-style-type:none" id="nameOp"></li>
                                                <li id="priceOp" style="list-style-type:none;display:none"></li>
                                                <li style="list-style-type:none; display:none">Total : <span id="totalOption" style="font-weight:bold"></span>
                                                </li>
{{--                                                <input type="hidden" id="totalamount" name="totalamount" value="">--}}
                                                <input type="hidden" id="priceOp">
                                                <input type="hidden" name="option_id" id="idFinal">
                                                <input type="hidden" name="prixFinal" id="prixFinal">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-block pull-right" type="button" onclick="calc2()">Choisir les garanties</button>
                                </div>
                                <div class="setup-content" id="step-4">
                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-centered table-hover mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Titre</th>
                                                                <th scope="col">Prix</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($garanties as $garantie)
                                                                <tr>
                                                                    <td>
                                                                        <h3>{{$garantie->name}}</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>
                                                                            {{$garantie->price}}€
                                                                        </h3>
                                                                    </td>
                                                                    <td>
                                                                        <div class="quantity">
                                                                            <input type="number" onchange="addgurantee(this)" name="gurantee[]" data-input="{{$option->max_input}}" data-id="{{$garantie->id}}" min="0" data-price{{$garantie->id}}="{{$garantie->price}}" min="0" max="{{$option->max_input}}" step="1" value="0" class="qty">
                                                                        </div>
                                                    </td>
                                                    </tr>
                                                                <input type="hidden" name="gurantee_id[]" value="{{$garantie->id}}">
                                                    @endforeach</tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="display: none">
                                        <div id="flotterGarantie">
                                            <h2 class="fs-title">Selection</h2>
                                            <hr>
                                            <li style="list-style-type:none" id="nameGa"></li>
                                            <li style="list-style-type:none; display:none" id="priceGa"></li>
                                            <li style="list-style-type:none; display:none">Total : <span id="totalGarantie" style="font-weight:bold"></span>
                                            </li>
                                            <input type="hidden" id="priceGa">
                                            <input type="hidden" name="garantie_id" id="idFinalGarantie">
                                            <input type="hidden" name="prixFinalGarantie" id="prixFinalGarantie">
                                            <input type="hidden" id="priceGa">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary nextBtn btn-block pull-right" type="button" onclick="calcul()">Remplir les infos client</button>
                        </div>
                        <div class="setup-content" id="step-5">
                            <h2 class="fs-title">Informations Client</h2>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Prénom</label>
                                            <div class="input-group">
                                                <input type="text" id="fname" name="fname" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Nom</label>
                                            <div class="input-group">
                                                <input type="text" id="lname" name="lname" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Date de naissance</label>
                                            <div class="input-group">
                                                <input type="date" name="dob" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Lieu de naissance</label>
                                            <div class="input-group">
                                                <input type="text" name="place_of_birth" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Adresse E-mail</label>
                                            <div class="input-group">
                                                <input type="email" placeholder="" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Téléphone</label>
                                            <div class="input-group">
                                                <input type="tel" placeholder="" class="form-control" name="phone" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">N° Permis</label>
                                            <div class="input-group">
                                                <input type="text" id="numero_permis" name="permit" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Date de Délivrance</label>
                                            <div class="input-group">
                                                <input type="date" name="permit_issue" class="form-control" min="1975-01-01" max="2018-07-27" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Lieu de Délivrance</label>
                                            <div class="input-group">
                                                <input type="text" id="permit_place" name="permit_place" placeholder="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Adresse</label>
                                            <div class="input-group">
                                                <input type="text" placeholder="" class="form-control" id="address" name="address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Code Postal</label>
                                            <div class="input-group">
                                                <input type="text" placeholder="" class="form-control" id="postal_code" name="postal_code" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Ville</label>
                                            <div class="input-group">
                                                <input type="text" placeholder="" class="form-control" id="city" name="city" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Pays</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select d-block w-100" id="country" name="country">
                                                    <option value="France" selected="selected">France</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Afrique_Centrale">Afrique_Centrale</option>
                                                    <option value="Afrique_du_sud">Afrique du Sud</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Algerie">Algerie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Arabie_Saoudite">Arabie_Saoudite</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Armenie">Armenie</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerbaidjan">Azerbaidjan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="Bahrein">Bahrein</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermudes">Bermudes</option>
                                                    <option value="Bielorussie">Bielorussie</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bhoutan">Bhoutan</option>
                                                    <option value="Boznie_Herzegovine">Boznie Herzegovine</option>
                                                    <option value="Bresil">Bresil</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina_Faso">Burkina_Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Caiman">Caiman</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Canaries">Canaries</option>
                                                    <option value="Cap_vert">Cap_Vert</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Colombie</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo_democratique">Congo démocratique</option>
                                                    <option value="Cook">Cook</option>
                                                    <option value="Coree_du_Nord">Corée du Nord</option>
                                                    <option value="Coree_du_Sud">Coree du Sud</option>
                                                    <option value="Costa_Rica">Costa Rica</option>
                                                    <option value="Cote_d_Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="Egypte">Egypte</option>
                                                    <option value="Emirats_Arabes_Unis">Emirats Arabes Unis</option>
                                                    <option value="Equateur">Equateur</option>
                                                    <option value="Erythree">Erythree</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="Etats_Unis">Etats_Unis</option>
                                                    <option value="Ethiopie">Ethiopie</option>
                                                    <option value="Falkland">Falkland</option>
                                                    <option value="Feroe">Feroe</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="Georgie">Georgie</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Grece">Grece</option>
                                                    <option value="Grenade">Grenade</option>
                                                    <option value="Groenland">Groenland</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernesey">Guernesey</option>
                                                    <option value="Guinee">Guinee</option>
                                                    <option value="Guinee_Bissau">Guinee_Bissau</option>
                                                    <option value="Guinee equatoriale">Guinee Equatoriale</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Guyane_Francaise ">Guyane Francaise</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong_Kong">Hong_Kong</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indonesie">Indonésie</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Irlande">Irlande</option>
                                                    <option value="Islande">Islande</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italie">Italie</option>
                                                    <option value="Jamaique">Jamaique</option>
                                                    <option value="Jan Mayen">Jan Mayen</option>
                                                    <option value="Japon">Japon</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordanie">Jordanie</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kirghizstan">Kirghizistan</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Koweit">Koweit</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Lettonie">Lettonie</option>
                                                    <option value="Liban">Liban</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lituanie">Lituanie</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Lybie">Lybie</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedoine">Macedoine</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Madère">Madère</option>
                                                    <option value="Malaisie">Malaisie</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malte">Malte</option>
                                                    <option value="Man">Man</option>
                                                    <option value="Mariannes du Nord">Mariannes du Nord</option>
                                                    <option value="Maroc">Maroc</option>
                                                    <option value="Marshall">Marshall</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Maurice">Maurice</option>
                                                    <option value="Mauritanie">Mauritanie</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexique">Mexique</option>
                                                    <option value="Micronesie">Micronesie</option>
                                                    <option value="Midway">Midway</option>
                                                    <option value="Moldavie">Moldavie</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolie">Mongolie</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Namibie">Namibie</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk">Norfolk</option>
                                                    <option value="Norvege">Norvege</option>
                                                    <option value="Nouvelle_Caledonie">Nouvelle Caledonie</option>
                                                    <option value="Nouvelle_Zelande">Nouvelle Zelande</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Ouganda">Ouganda</option>
                                                    <option value="Ouzbekistan">Ouzbekistan</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestine">Palestine</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papouasie_Nouvelle_Guinee">Papouasie Nouvelle Guinee</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Pays_Bas">Pays Bas</option>
                                                    <option value="Perou">Perou</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pologne">Pologne</option>
                                                    <option value="Polynesie">Polynesie</option>
                                                    <option value="Porto_Rico">Porto Rico</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republique_Dominicaine">Republique Dominicaine</option>
                                                    <option value="Republique_Tcheque">Republique Tchèque</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Roumanie">Roumanie</option>
                                                    <option value="Royaume_Uni">Royaume Uni</option>
                                                    <option value="Russie">Russie</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Sahara Occidental">Sahara Occidental</option>
                                                    <option value="Sainte_Lucie">Sainte_Lucie</option>
                                                    <option value="Saint_Marin">Saint_Marin</option>
                                                    <option value="Salomon">Salomon</option>
                                                    <option value="Salvador">Salvador</option>
                                                    <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                    <option value="Samoa_Americaine">Samoa_Americaine</option>
                                                    <option value="Sao_Tome_et_Principe">Sao Tome et Principe</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapour">Singapour</option>
                                                    <option value="Slovaquie">Slovaquie</option>
                                                    <option value="Slovenie">Slovenie</option>
                                                    <option value="Somalie">Somalie</option>
                                                    <option value="Soudan">Soudan</option>
                                                    <option value="Sri_Lanka">Sri_Lanka</option>
                                                    <option value="Suede">Suede</option>
                                                    <option value="Suisse">Suisse</option>
                                                    <option value="Surinam">Surinam</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Syrie">Syrie</option>
                                                    <option value="Tadjikistan">Tadjikistan</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Tanzanie">Tanzanie</option>
                                                    <option value="Tchad">Tchad</option>
                                                    <option value="Thailande">Thailande</option>
                                                    <option value="Tibet">Tibet</option>
                                                    <option value="Timor_Oriental">Timor_Oriental</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Trinite_et_Tobago">Trinite et Tobago</option>
                                                    <option value="Tristan da cunha">Tristan de cuncha</option>
                                                    <option value="Tunisie">Tunisie</option>
                                                    <option value="Turkmenistan">Turmenistan</option>
                                                    <option value="Turquie">Turquie</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican">Vatican</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vierges_Americaines">Vierges Americaines</option>
                                                    <option value="Vierges_Britanniques">Vierges Britanniques</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Wake">Wake</option>
                                                    <option value="Wallis et Futuma">Wallis et Futuma</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Yougoslavie">Yougoslavie</option>
                                                    <option value="Zambie">Zambie</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre d'adulte(s) *</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select d-block w-100" id="adults" name="adults">
                                                    <option selected="selected">1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre d'enfant(s) *</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select d-block w-100" id="children" name="children">
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre de bébé(s) *</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select d-block w-100" id="babies" name="babies">
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Numero de vol </label>
                                            <div class="input-group">
                                                <input type="text" placeholder="ex. TX542" class="form-control" name="flight_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nb_conducteurs"></div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Informations complémentaire</label>
                                            <div class="input-group">
                                                <textarea placeholder="Notes about your order, e.g. special notes for car." class="form-control" id="details" name="details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="title-blue">Paiement</h3>
                                        <hr class="m-t-0 m-b-30">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Moyen de Paiement</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="TotalTTC" id="TotalTTC">
                                                        <select class="form-control custom-select d-block w-100" id="payment_method" name="payment_method" onchange="moyenPaiementGet(this.options[this.selectedIndex].text)" required>
                                                            <option value="Paiement sur place">Paiement sur place</option>
{{--                                                            @foreach($gateways as $gateway)--}}
{{--                                                                <option value="{{$gateway->id}}">{{$gateway->nom_client}} @if($gateway->nom_client != $gateway->nom) - {{$gateway->nom}} @endif</option>--}}
{{--                                                            @endforeach--}}
                                                        </select>
                                                        <input type="hidden" id="gatewayGet">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-form-label">Montant</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="totalamount" name="totalamount" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-block pull-right" type="submit">Valider la réservation</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-xl navbar-dark bg-dark" id="nav_step"> <a class="navbar-brand" id="titre_page" style="color:white">Date & lieux reservation</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample06">
                    <ul class="navbar-nav mr-auto"></ul>
                    <h3 id="finalForm" style="color:white"></h3>
                </div>
            </nav>
        </div>
    </div>
    </div>

@endsection
@push('styles')
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('backend/assets/js/dynamic-form.js')}}"></script>

    <script>
        $('.datepicker').pickadate({formatSubmit: 'yyyy-mm-dd',hiddenName: true});
        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],select"),
                    isValid = true;

                $(".form-group").removeClass("focused");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("focused");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>
@endpush
