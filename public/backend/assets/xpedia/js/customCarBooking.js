function dayDiff(d1, d2)
{
  d1 = d1.getTime() / 86400000;
  d2 = d2.getTime() / 86400000;
  return new Number(d2 - d1).toFixed(0);
}
if(document.getElementById('date_depart'))
{
    var d11 = new Date(document.getElementById("date_depart").value);
    var d12 = new Date(document.getElementById("date_retour").value);
    document.getElementById('duration').innerHTML = dayDiff(d11, d12)+' Jours';
    var duration_r = dayDiff(d11, d12);
    console.log(duration_r);
    window.localStorage.setItem('duration_r',duration_r);
}
window.onload = function()
{
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const date_depart = urlParams.get('date_depart')
    const heure_depart = urlParams.get('heure_depart')
    const lieu_depart = urlParams.get('lieu_depart')
    const date_retour = urlParams.get('date_retour')
    const heure_retour = urlParams.get('heure_retour')
    const lieu_retour = urlParams.get('lieu_retour')
    var date_depart_a = new Date (date_depart);
    var date_retour_a = new Date (date_retour);
    var daysIn = (date_retour_a.getTime() - date_depart_a.getTime())/(1000 * 3600 * 24);
    var csrf = $('meta[name="csrf-token"]').attr('content')
    const DivElement = document.getElementById('scrollTo');
    DivElement.scrollIntoView({ block: 'end',  behavior: 'smooth' });
    $('#responses').append('\
    <div id="loading-image"style="margin: 80px auto">\
        <h3>Recherche en cours</h3>\
        <img style="padding:10% 40%" src="../assets/xpedia/img/ajax-loader.gif" alt="Loading..." />\
    </div>')

    $.ajax
    ({
        type: "GET",
        dataType: "json",
        url: "/Clientjson",
        data:"date_depart="+date_depart+" "+heure_depart+"&date_retour="+date_retour+" "+heure_retour,

        success: function(response)
        {
            $('#loading-image').remove();
            console.log("days in = "+ date_depart+" "+ heure_depart);
            var prix =0;
            var j=1;
            for(var i =0 ; i<response.modeles.length;i++)
            {
                var prixCategorie = eval('response.'+'prixCategorie'+response.modeles[i].categorie_id);
                var prix_total_vehicule = prixCategorie;
                console.log('prixTotalv = '+prix_total_vehicule)
                var prix = prixCategorie/daysIn;
                console.log(response.modeles[i].img_url)
                $("#responses").append('\
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">\
                    <div class="x_car_offer_main_boxes_wrapper float_left">\
                        <div class="x_car_offer_starts float_left"></div>\
                        <div class="x_car_offer_img float_left">\
                            <img src="'+response.modeles[i].img_url+'" alt="img">\
                        </div>\
                        <div class="x_car_offer_price float_left">\
                            <div class="x_car_offer_price_inner">\
                                <h3>'+prix_total_vehicule+'€</h3>\
                            </div>\
                        </div>\
                        <div class="x_car_offer_heading float_left">\
                            <h2><a href="#">'+response.modeles[i].marque.name+' '+response.modeles[i].name+'</a></h2>\
                        </div>\
                        <div class="x_car_offer_bottom_btn float_left">\
                                <form action="/car_reserve" method="POST">\
                                    <input type="hidden" name="_token" value="'+csrf+'" />\
                                    <input type="hidden" name="vehicule_id" value ="'+response.modeles[i].vehicule[0].id+'">\
                                    <input type="hidden" name="date_depart_r" value ="'+date_depart+'">\
                                    <input type="hidden" name="date_retour_r" value ="'+date_retour+'">\
                                    <input type="hidden" name="lieu_depart_r" value ="'+lieu_depart+'">\
                                    <input type="hidden" name="lieu_retour_r" value ="'+lieu_retour+'">\
                                    <input type="hidden" name="time_depart_r" value ="'+heure_depart+'">\
                                    <input type="hidden" name="time_retour_r" value ="'+heure_retour+'">\
                                    <input type="hidden" name="prix_vehicule" value ="'+prix+'">\
                                    <ul>\
                                        <li><button type="submit">Choisir</button>\
                                        </li>\
                                    </ul>\
                                </form>\
                        </div>\
                    </div>\
                </div>\
                ')
            }
        },
        error:function(error)
        {
            alert(error);
        },
    })
  };
window.addEventListener("load", function()
{
    // create one global XHR object for CT requests
    var micrositeBaseURL = "/car_booking";

    //Set up the location fields for autocompletion

    //Handle the form Submission

    //PAGE D'ACCEUIL
    document.getElementById('car_booking').addEventListener("submit", function(evt)
        {
            evt.preventDefault();

            //Get data from form
            var pickupLocation = document.getElementById('agence_depart').value;
            var returnLocation = document.getElementById('agence_retour').value;
            var pickupDate = document.getElementById('pickup-date').value;
            var pickupTime = document.getElementById('pickup-time').value;
            var returnDate = document.getElementById('return-date').value;
            var returnTime = document.getElementById('return-time').value;
            console.log (pickupLocation);
            console.log (pickupLocation);
            console.log (pickupLocation);
            console.log (pickupLocation);
            console.log (pickupLocation);

           if(pickupLocation && pickupDate && pickupTime && returnTime != "")
           {
            //Construct deeplink
            var micrositeURL = `${micrositeBaseURL}?lieu_depart=${pickupLocation}&date_depart=${pickupDate}&heure_depart=${pickupTime}&date_retour=${returnDate}&heure_retour=${returnTime}`;

            //Add return location to query params if differnt return location is set
            if(document.getElementById("myCheck").checked && returnLocation != "") {
                micrositeURL = `${micrositeURL}&lieu_retour=${returnLocation}`;
            }else{
                micrositeURL = `${micrositeURL}&lieu_retour=${pickupLocation}`;
            }

            //Open deeplink in a new tab
            window.open(micrositeURL, '_blank');
            }
            else
            {
                alert('Veuillez sélectionner tous les champs');
            }


        }, true);

        document.getElementById('car_bookingAjax').addEventListener("submit", function(evt)
        {
            $( "#responses" ).empty();
            evt.preventDefault();
            //Get data from form
            var pickupLocation = document.getElementById('agence_depart').value;
            var returnLocation = document.getElementById('agence_retour').value;
            var pickupDate = document.getElementById('pickup-date').value;
            var pickupTime = document.getElementById('pickup-time').value;
            var returnDate = document.getElementById('return-date').value;
            var returnTime = document.getElementById('return-time').value;
            var date_depart = new Date (pickupDate);
            var date_retour = new Date (returnDate);
            var daysIn = (date_retour.getTime() - date_depart.getTime())/(1000 * 3600 * 24);
            var csrf = $('meta[name="csrf-token"]').attr('content')

            const DivElement = document.getElementById('scrollTo');
            DivElement.scrollIntoView({ block: 'end',  behavior: 'smooth' });
            $('#responses').append('\
            <div id="loading-image"style="margin: 80px auto">\
                <h3>Recherche en cours</h3>\
                <img style="text-align:center" src="../assets/xpedia/img/img/ajax-loader.gif" alt="Loading..." />\
            </div>')

            if(pickupLocation && pickupDate && pickupTime && returnTime != "")
            {
                $.ajax
                ({
                    type: "GET",
                    dataType: "json",
                    url: "/Clientjson",
                    data:"date_depart="+pickupDate+" "+pickupTime+"&date_retour="+returnDate+" "+returnTime+"",

                    success: function(response)
                    {
                        $('#loading-image').remove();
                        console.log(response)

                        var prix =0;
                        var j=1;
                        for(var i =0 ; i<response.modeles.length;i++)
                        {
                            var prixCategorie = eval('response.'+'prixCategorie'+response.modeles[i].categorie_id);
                            var prix_total_vehicule = prixCategorie;
                            console.log('prixTotalv = '+prix_total_vehicule)
                            var prix = prixCategorie;
                            console.log(response.modeles[i].img_url)
                            console.log(response)
                            $("#responses").append('\
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">\
                                <div class="x_car_offer_main_boxes_wrapper float_left">\
                                    <div class="x_car_offer_img float_left">\
                                        <img style="width:200px"src="'+response.modeles[i].img_url+'" alt="img">\
                                    </div>\
                                    <div class="x_car_offer_price float_left">\
                                        <div class="x_car_offer_price_inner">\
                                            <h3>'+prix+'€</h3>\
                                        </div>\
                                    </div>\
                                    <div class="x_car_offer_heading float_left">\
                                        <h2><a href="#">'+response.modeles[i].name+'</a></h2>\
                                    </div>\
                                    <div class="x_car_offer_bottom_btn float_left">\
                                        <div class="button_home float_left">\
                                            <form action="/car_reserve" method="POST">\
                                                <input type="hidden" name="_token" value="'+csrf+'" />\
                                                <input type="hidden" name="vehicule_id" value ="'+response.modeles[i].vehicule[0].id+'">\
                                                <input type="hidden" name="date_depart_r" value ="'+pickupDate+'">\
                                                <input type="hidden" name="date_retour_r" value ="'+returnDate+'">\
                                                <input type="hidden" name="lieu_depart_r" value ="'+pickupLocation+'">\
                                                <input type="hidden" name="lieu_retour_r" value ="'+returnLocation+'">\
                                                <input type="hidden" name="time_depart_r" value ="'+pickupTime+'">\
                                                <input type="hidden" name="time_retour_r" value ="'+returnTime+'">\
                                                <input type="hidden" name="prix_vehicule" value ="'+prix/daysIn+'">\
                                                <ul>\
                                                    <li><button class="btn btn-success" type="submit">Choisir</button>\
                                                    </li>\
                                                </ul>\
                                            </form>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                            ')
                           $('')
                        }
                        //faire un tableau avec toute les voitures + leur prix par jour
                    },
                    error:function(error)
                    {
                        alert(error);
                    },
                })
            }
            else
            {
                alert('Veuillez sélectionner tous les champs');
            }


        }, true);
    //Handle checkbox/return location field
    // document.getElementById("myCheck").addEventListener("click", function(evt)
    // {
    //     //Update UI based on checkbox
    //     document.getElementById("agence_retour").style.display = (this.checked) ? "block" : "none";
    //     document.getElementById("myCheck-form").style.display = (this.checked) ? "none" : "block";
    //     //document.getElementById("pickup-location-container").setAttribute('class', (this.checked) ? "col-md-5" : "col-md-5");
    // });


});
