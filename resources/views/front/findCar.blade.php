@extends('layouts.front')
@section('content')
    <!-- Recommended Cars -->
    <section class="section-padding car-booking">
        <div class="container">
            <form action="{{route('booking.submit')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-header text-center">
                            <div class="section-heading">
                                <h3 class="text-custom-black">Véhicules disponibles</h3>
                                <div class="section-description">
                                    <p class="text-light-dark">
                                        Véhicules disponibles aux dates sélectionnées
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($cats as $cat)
                                @php
                                $ids= DB::table('reservations')
                                ->whereRaw('"'.$depart.'" between `departure_date` and `return_date`')
                                  ->pluck('vehicle_id');
                                $uni = $ids->unique();
                                $vehicles = \App\Vehicle::whereNotIn('id', $uni)->where('category', $cat->id)->get();
                                @endphp
                                @foreach($vehicles as $row)
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                    <div class="row">
                                        @php
                                            $check = \App\SeasonCategory::where('category_id', $row->categorie->id)->first();
                                            $season = \App\Season::find($check->season_id);
                                        @endphp
                                        <div class="col-12">
                                            <div class="car-grid">
                                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                                    <div class="image-sec animate-img">
                                                        <label style="width: 100%; height: 100%" for="abc{{$row->id}}"> <img style="width: 100%" src="{{asset($row->image)}}" class="full-width" alt="img"> </label>
                                                    </div>
                                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                                        <h4 class="title fs-16"><a href="#" class="text-custom-black">{{$row->marque->name??'Not available'}} {{$row->modal->name??'Not available'}} ({{$row->registration??'Not available'}})<small class="text-light-dark">Par jour</small></a></h4>
                                                        <br>
                                                        <span class="price">{{$season->price}} €</span>
                                                        <p><input name="vehicle_price" onclick="carselect(this)" id="abc{{$row->id}}" data-vehicle="{{$row->id}}" value="{{$season->price}}" type="radio" class="form-control"></p>
                                                        <div class="action">
                                                            <label style="width: 100%; height: 100%" for="abc{{$row->id}}">
                                                                <a style="width: 100%" class="btn-first btn-submit yellow" >Sélectionnez ce véhicule</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                                <input type="hidden" name="vehicle_id" class="vehicle_id" value="0">
                        </div>
                        <?php
                        $start_agency = \App\Agency::find($start_point);
                        $end_agency = \App\Agency::find($end_point);
                        ?>
                        <input type="hidden" class="start_point" name="start_price" value="{{$start_agency->price}}">
                        <input type="hidden" class="end_point" name="end_price" value="{{$end_agency->price}}">


                        <input type="hidden" name="start_point" value="{{$start_point}}">
                        <input type="hidden" name="end_point" value="{{$end_point}}">
                        <input type="hidden" name="departure_date" value="{{$depart}}">
                        <input type="hidden" name="departure_time" value="{{$start_time}}">
                        <input type="hidden" name="return_date" value="{{$retour}}">
                        <input type="hidden" name="return_time" value="{{$end_time}}">
                        <input id="days" type="hidden" name="days" value="{{$days}}">
                        <input id="rate_per_day" type="hidden" name="rate_per_day" value="">
                        <input id="totalamount" type="hidden" name="totalamount" value="">
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">Sélectionnez les options</h3>
                                <hr>
                            </div>
                            @foreach($options as $option)
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset($option->image)}}" style="width: 100%" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <h4>{{$option->name}}</h4>
                                            <p>{{$option->description}}</p>
                                            <p>{{$option->price}} €</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Max: {{$option->max_input}}</p>
                                            <input oninput="addoptions(this)" onchange="addoptions(this)" name="options[]" value="0" data-id="{{$option->id}}" data-input="{{$option->max_input}}" min="0" data-price{{$option->id}}="{{$option->price}}" max="{{$option->max_input}}" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="options_id[]" value="{{$option->id}}">
                                <br>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">Sélectionnez la garantie</h3>
                                <hr>
                            </div>
                            @foreach($gurantees as $optio)
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset($optio->image)}}" style="width: 100%" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <h4>{{$optio->name}}</h4>
                                            <p>{{$optio->description}}</p>
                                            <p>{{$optio->price}} €</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Max: {{$optio->max_input}}</p>
                                            <input onchange="addgurantee(this)" oninput="addgurantee(this)" type="number" value="0" name="gurantee[]" data-input="{{$optio->max_input}}" data-id="{{$optio->id}}" min="0" data-price{{$optio->id}}="{{$optio->price}}" max="{{$optio->max_input}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="gurantee_id[]" value="{{$optio->id}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="text-custom-black">Vos informations personnelles</h5>
{{--                                            <h5 class="text-custom-black"><b id="total">0</b>€</h5>--}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Prénom</label>
                                                        <div class="input-group">
                                                            <input type="text" id="fname" name="fname" placeholder="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Nom</label>
                                                        <div class="input-group">
                                                            <input type="text" id="lname" name="lname" placeholder="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Date de naissance</label>
                                                        <div class="input-group">
                                                            <input type="date" name="dob" placeholder="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Lieu de naissance</label>
                                                        <div class="input-group">
                                                            <input type="text" name="place_of_birth" placeholder="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Adresse E-mail</label>
                                                        <div class="input-group">
                                                            <input type="email" placeholder="" class="form-control" name="email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Téléphone</label>
                                                        <div class="input-group">
                                                            <input type="tel" placeholder="" class="form-control" name="phone" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">N° Permis</label>
                                                        <div class="input-group">
                                                            <input type="text" id="numero_permis" name="permit" placeholder="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Date de Délivrance</label>
                                                        <div class="input-group">
                                                            <input type="date" name="permit_issue" class="form-control" min="1975-01-01" max="2018-07-27" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Code Postal</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="" class="form-control" id="postal_code" name="postal_code" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Ville</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="" class="form-control" id="city" name="city" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-form-label">Pays</label>
                                                        <div class="input-group">
                                                            <select class="custom-select form-control form-control-custom" id="country" name="country">
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre d'adulte(s) *</label>
                                                        <div class="input-group">
                                                            <select class="custom-select form-control form-control-custom" id="adults" name="adults">
                                                                <option selected="selected">1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre d'enfant(s) *</label>
                                                        <div class="input-group">
                                                            <select class="custom-select form-control form-control-custom" id="children" name="children">
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
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre de bébé(s) *</label>
                                                        <div class="input-group">
                                                            <select class="custom-select form-control form-control-custom" id="babies" name="babies">
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
                                                <div class="col-md-12">
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
                                                            <textarea class="form-control" id="details" name="details"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <hr class="mt-0">
                                                    <div class="form-group">
                                                        <label class="custom-checkbox">
                                                            <input type="checkbox" name="#">
                                                            <span class="checkmark"></span> En continuant, vous acceptez les <a href="#" class="text-custom-blue">Termes et conditions.</a> </label>
                                                    </div>
                                                    <button type="submit" class="btn-first btn-submit">Confirmer la réservation</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Car -->
@endsection
