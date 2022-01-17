//LOGIC OPTION
tot=0;
FinalPrice =0;

finalName = " ";
optionNames=[];
idFinal=[];
total_form = 0;

function addOption(id){
   event.preventDefault();
   var option_id = $('#id_option'+id).val();
   cpt_up = $('#cpt_up'+id).val();
   cpt_up ++;
   nb_max_resa = $('#nb_max_resa'+id).val();
   //console.log('nb_max_resa = '+nb_max_resa)
   //console.log("compteur ",cpt_up);
   if (cpt_up > nb_max_resa) {
    // console.log("error");
   }else{

 // Recuperation des donnée (prix_par_jour & name)
   var namOption = document.querySelector('#name_'+id);
   price = document.querySelector('#price_'+id);
   //if isDaily + ajouter priceOption
   priceT = 0;
   priceT += parseFloat(price.value);

   //envoyer ce li dans checkoutCard final
   var li =$('<li id="nameOp'+id+'">'+namOption.value+' '+price.value+'€ </li><input type="hidden" id="finalNameOp'+id+'" value="'+namOption.value+'"><input type="hidden" id="id_out'+id+'" value="'+option_id+'">');
   $('#nameOp').append(li);

   //stockage li
   nameTest = document.querySelector("#finalNameOp"+id);
   //incrementation du prix
   tot+=priceT;
   console.log("Total :",tot);
   //ajout des optionName dans un tableau
   cout = optionNames.push(nameTest.value);
   optionNames.join('  ');
   console.log(optionNames);



   //ajout id dans le tab idFinal
   cin = idFinal.push(option_id);
   idFinal.join('/');
   console.log(idFinal);

   //affichage du prix

   document.getElementById('totalOption').innerHTML = tot+" €  ";
   document.getElementById('idFinal').value = idFinal;
   document.getElementById('prixFinal').value = tot;
   console.log(tot)
   total_form = (Number(document.getElementById('prix_total_vehicule_'+document.getElementById('marque_id').value).value) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value) + Number(tot));
   document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
 }

};
//fonction suprresion nameOptionPost par name
function arrayUnset(array, value){
  array.splice(array.indexOf(value), 1);
}

function removeOption(id){
  var option_id = $('#id_option'+id).val();
  //bloquage a l'entrée
  var optionIntput = $('#nameOp'+id+'').val();
  if (optionIntput === undefined) {
    console.log("Entrée bloquée");
  }else{
  //ISDALY LOGIC
  var isDaily = document.querySelector('#isDaily'+id).value;
  var days = document.querySelector('#days').value;
  //name remouve -> supprime li sur checkoutCard
  var nameRemove = $('#nameOp'+id);
  nameRemove.remove();
  // Retire les input hidden
  var hiddenInput_finalName = $('#finalNameOp'+id);
  hiddenInput_finalName.remove();
  var hiddenInput_idOut = $('#id_out'+id);
  hiddenInput_idOut.remove();

  //Retire element tableau optionNames=[];
  var namOptionPost = document.querySelector('#name_'+id);
  arrayUnset(optionNames,namOptionPost.value);


  //Retire l'id du tab idFinal
  //id_out
  var id_out = document.querySelector('#id_out'+id);
  //arrayUnset(idFinal,id_out.value);
  console.log("Mes ids = "+idFinal);

  //decrementation du prix
  var prix_option_remove = 0;
  price = document.querySelector('#price_'+id);
  if(isDaily == 1)
  {
    console.log("isDailyRemove = "+isDaily)
    prix_option_remove = price.value *days;
  }else{
    prix_option_remove = price.value;
  }
  console.log("priceT remove : ",prix_option_remove);
  tot-=prix_option_remove;
  console.log("Total : ",tot);

  //envoie
  document.getElementById('totalOption').innerHTML = tot+" €  ";
  // document.getElementById('optionNames').innerHTML = optionNames;
  document.getElementById('idFinal').value = idFinal;
  document.getElementById('prixFinal').value = tot;
  total_form = (Number(document.getElementById('prix_total_vehicule_'+document.getElementById('marque_id').value).value) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value) + Number(tot));
  document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
  //modifie le prix sur la vu (recap)
  /*var testRemoveNameOp = document.getElementById('#nameOp'+id).value;
  testRemoveNameOp.remove();*/
  }
};

var idFinal = document.getElementById('idFinal').innerHTML = idFinal;
console.log(idFinal);

//LOGIC GARANTIE
totGarantie=0;
//FinalPricegarantie =0;
finalNameGarantie = " ";
garantieNames=[];
idFinalGarantie=[];


function addGarantie(id){
   event.preventDefault();
   var garantie_id = $('#id_garantie'+id).val();
   var nb_max_resa_ga = 1;
   //console.log('nb_max_resa_ga = '+nb_max_resa_ga);
   cpt_upGa = $('#cpt_upga'+id).val();
   cpt_upGa ++;
   //console.log("compteur ",cpt_upGa);
   if (cpt_upGa > 1) {
     //console.log("error");
   }else{

 // Recuperation des donnée (prix_par_jour & name)
   var namGarantie = document.querySelector('#nameGarantie_'+id);
   price = document.querySelector('#priceGarantie_'+id);
   priceT = 0;
   if(document.querySelector('#typeGarantie_'+id).value == 1){
     pricer = price.value * document.querySelector('#days').value;
     priceT += parseFloat(pricer);
   }else{
     priceT += parseFloat(price.value);
   }
   console.log(pricer);
   //envoyer ce li dans checkoutCard final
   var li =$('<li id="nameGa'+id+'">'+namGarantie.value+' '+pricer+'€ </li><input type="hidden" id="finalNameGarantie'+id+'" value="'+namGarantie.value+'"><input type="hidden" id="id_outGa'+id+'" value="'+garantie_id+'">');
   $('#nameGa').append(li);

   //stockage li
   nameTest = document.querySelector("#finalNameGarantie"+id);
   //incrementation du prix
   totGarantie+=priceT;
   console.log("Total :",totGarantie);
   //ajout des garantieName dans un tableau
   cout = garantieNames.push(nameTest.value);
   garantieNames.join('  ');
   console.log(garantieNames);



   //ajout id dans le tab idFinal
   cin = idFinalGarantie.push(garantie_id);
   idFinalGarantie.join('/');
   console.log(idFinalGarantie);

   //affichage du prix

   document.getElementById('totalGarantie').innerHTML = totGarantie+" €  ";
   document.getElementById('idFinalGarantie').value = idFinalGarantie;
   document.getElementById('prixFinalGarantie').value = totGarantie;

   total_form = (Number(document.getElementById('prix_total_vehicule_'+document.getElementById('marque_id').value).value) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value) + Number(document.getElementById('prixFinal').value) + Number(totGarantie));
   document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
 }

};

//fonction suprresion nameGarantiePost par name
function arrayUnset(array, value){
  array.splice(array.indexOf(value), 1);
}

function removeGarantie(id){
  var isGarantieDaily = document.querySelector('#isGarantieDaily'+id).value;
  var prix_garantie_remove = 0;
  var days = document.querySelector('#days').value;
  var garantie_id = $('#id_garantie'+id).val();
  console.log("id",garantie_id);
  //bloquage a l'entrée
  var garantieIntput = $('#nameGa'+id+'').val();
  if (garantieIntput === undefined) {
    console.log("Entrée bloquée");
  }else{
  //name remouve -> supprime li sur checkoutCard
  var nameRemove = $('#nameGa'+id);
  nameRemove.remove();
  //Retire element tableau garantieNames=[];
  var namGarantiePost = document.querySelector('#nameGarantie_'+id);
  arrayUnset(garantieNames,namGarantiePost.value);
  console.log("my array = " ,garantieNames);

  //Retire l'id du tab idFinalGarantie
  //id_out
  var id_outGa = document.querySelector('#id_outGa'+id);
  arrayUnset(idFinalGarantie,id_outGa.value);
  console.log(idFinalGarantie);
  // Retire les input hidden
  var hiddenInput_finalName = $('#finalNameGarantie'+id);
  hiddenInput_finalName.remove();
  var hiddenInput_idOut = $('#id_outGa'+id);
  hiddenInput_idOut.remove();
  //decrementation du prix
  price = document.querySelector('#priceGarantie_'+id);
  if(isGarantieDaily == 1)
  {
    console.log("isDailyGarantieRemove = "+isGarantieDaily)
    prix_garantie_remove = price.value * days;
  }else{
    prix_garantie_remove = price.value;
  }
  console.log("priceT remove:",prix_garantie_remove);
  totGarantie-=prix_garantie_remove;
  console.log("Total : ",totGarantie);

  //envoie
  document.getElementById('totalGarantie').innerHTML = totGarantie+" €  ";
  //document.getElementById('garantieNames').innerHTML = garantieNames;
  document.getElementById('idFinalGarantie').value = idFinalGarantie;
  document.getElementById('prixFinalGarantie').value = totGarantie;
  //modifie le prix sur la vu (price)
  total_form = (Number(document.getElementById('prix_total_vehicule_'+document.getElementById('marque_id').value).value) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value) + Number(document.getElementById('prixFinal').value) + Number(totGarantie));
  document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
}
};
//conversion YYYY/MM/DD to DD/MM/YYYY


function convertDate(dateString){
  var p = dateString.split(/\D/g)
  return [p[2],p[1],p[0] ].join("-")
  }

  //"11-9-2001"


// AFFICHAGE TOTAL
// INSTANCIATION PRIXFINAL
$('#lieu_depart').on('change', function(){
    document.getElementById('prixLieuDepartGet').value = $(this).find("option:selected").attr('data-price');
    document.getElementById('prixLieuRetourGet').value = $(this).find("option:selected").attr('data-price');
});
$('#lieu_retour').on('change', function(){
    document.getElementById('prixLieuRetourGet').value = $(this).find("option:selected").attr('data-price');
});
function nomLieuDepart(select)
{
  console.log(select);
  document.getElementById('nomLieuDepartGet').innerHTML = select;
}
function nomLieuRetour(select_two){
  console.log(select_two);
  document.getElementById('nomLieuRetourGet').innerHTML = select_two;
}
function calc0()
{
  //trigger function login screen
    // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
  $('#loader').removeClass('hidden')
  /////////////
   /*var nom_lieu_depart = document.querySelector('#nomLieuDepartGet').innerHTML;
   var nom_lieu_retour = document.querySelector('#nomLieuRetourGet').innerHTML;
   console.log('nom_lieu_depart : '+nom_lieu_depart);
   console.log('nom_lieu_retour : '+nom_lieu_retour);*/

  var time_depart_out = document.querySelector('#time_depart').value;
  var time_retour_out = document.querySelector('#time_retour').value;
  var date_depart_out = document.querySelector('[name="date_depart"]').value;
  var date_retour_out = document.querySelector('[name="date_retour"]').value
  date_depart_out = convertDate(date_depart_out);
  date_retour_out = convertDate(date_retour_out);

  // // var prix_lieux_total = parseFloat(prix_lieux_depart)+parseFloat(prix_lieux_retour);
  var date_depart = new Date (document.querySelector('[name="date_depart"]').value);
  var date_retour = new Date (document.querySelector('[name="date_retour"]').value);
  var daysIn = (date_retour.getTime() - date_depart.getTime())/(1000 * 3600 * 24);

  // // stockage des jours sur le front
   document.getElementById('days').value = daysIn;

   //affichage des infos sous la progress bar
   //document.getElementById('days_under_progress_bar').innerHTML = daysIn
   //total_form += parseFloat(prix_lieux_total);//parseFloat(totalOption) +

/*   document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
   document.getElementById('titre_page').innerHTML = 'Choix du Vehicule';

   document.getElementById('info_agence_depart').innerHTML = 'De '+nom_lieu_depart+'<br>Le '+date_depart_out+' à '+time_depart_out;
   document.getElementById('info_agence_retour').innerHTML = 'De '+nom_lieu_retour+'<br>Le '+date_retour_out+' à '+time_retour_out;
   document.getElementById('info_agence_depart_under_progress_bar').innerHTML = 'Le '+date_depart_out+' à '+time_depart_out;
   document.getElementById('info_agence_retour_under_progress_bar').innerHTML = 'Le '+date_retour_out+' à '+time_retour_out;*/
  var date_debut = document.querySelector('[name="date_depart"]').value + ' '+time_depart_out;
  var date_fin = document.querySelector('[name="date_retour"]').value + ' '+time_retour_out;

  $(".responses").empty();
      $.ajax({
          type: "GET",
          dataType: "json",
          url: "/admin/json",
          data:"date_depart="+date_debut+"&date_retour="+date_fin+"",

          success: function(response)
          {
              if (response.length === 0){
                  alert("Oops ! Il n'y a pas de véhicule disponible en saison pour ces dates. Allez à la section Saison et prix pour ajouter la saison et le prix en premier.");
                  $('#loader').addClass('hidden');
              }else {
                  $.each(response, function(i, item) {
                      $('.responses').append(`<div class="cards">
                                                    <h2>`+item.vehicle_marque+`  `+item.vehicle_modal+` <b>(`+item.vehicle_number+`)</b></h2>
                                                    <label for="`+item.vehicle_id+`">
                                                        <img src="/`+item.vehicle_image+`" style="width:200px"></label>
                                                    <p><b>`+item.price+`</b> € / par jour</p>
                                                    <br>
                                                    <input type="radio" id="`+item.vehicle_id+`" name="vehicle_price" value="`+item.price+`" style="height: 2em;" onclick="carselect(this)">
                                                    <input type="hidden" name="vehicle_id" value="`+item.vehicle_id+`" style="height: 2em;">
                                                </div>`);
                  });
              }


          },
          complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
            $('#loader').addClass('hidden')
        },
      });
}
function modeleid(id){
   document.getElementById('titre_page').innerHTML = document.getElementById('nom_vehicule_'+id).value;
   total_form = (Number(document.getElementById('prix_total_vehicule_'+id).value) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value) + Number(document.getElementById('prixFinal').value) + Number(totGarantie));
   document.getElementById('finalForm').innerHTML ="Total avec livraison : "+ total_form + '  €' ;
   document.querySelector('#marque_id').value = id;
   document.querySelector('#vehicule_id').value = document.querySelector('#selectveh_'+id).value;
   //vehiculeid(document.querySelector('#vehicule_id').value);
   $('.vehicule_id_ima').addClass('hidden');
   $('#selectveh_'+id).removeClass('hidden');

}
function carselect(elem){
    var rate_per_day =  elem.value;
    var days = $("#days").val();
    var total = days *rate_per_day;
    $("#total").html(total);
    $("#totalamount").val(total);
}
function addoptions(elem){
    var value =  elem.value;
    var id =  $(elem).data('id');
    var price =  $(elem).data('price'+id);
    var input =  $(elem).data('input');
    if (input > value){
        var totaloption = value * price;
        var total = $("#totalamount").val();
        var finaltotal = (+total) + (+totaloption);
        $("#total").html(finaltotal);
        $("#totalamount").val(finaltotal);
    }

}
function addgurantee(elem){
    var value =  elem.value;
    var id =  $(elem).data('id');
    var price =  $(elem).data('price'+id);
    var input =  $(elem).data('input');
    if (input > value) {
        var totaloption = value * price;
        var total = $("#totalamount").val();
        var finaltotal = (+total) + (+totaloption);
        $("#total").html(finaltotal);
        $("#totalamount").val(finaltotal);
    }
}
function vehiculeid(id){
   document.querySelector('#vehicule_id').value = id;
}
function calc1()
{
  //var nom_vehicule = document.querySelector('#nom_vehicule').value;
  // var marque_vehicule = document.querySelector('#marque_vehicule').value;

  var days = document.querySelector('#days').value;
  //console.log("days : " + days);
  var id = document.querySelector('#marque_id').value;
  var prix_total_vehicule = document.querySelector('#prix_total_vehicule_'+id).value;
  var prix_vehicule_journee = prix_total_vehicule/days;
  total_form = (Number(prix_total_vehicule) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value));
  console.log('voiture / days = ' + total_form);
  //document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
  document.getElementById('titre_page').innerHTML = 'Choix des Options';
  //document.getElementById('nom_modele_vehicule').innerHTML = document.querySelector('#nom_vehicule_'+id).value;
}
function calc2()
{
  var totalOption = document.querySelector('#prixFinal').value;
  if (totalOption == "") {
    totalOption = 0;
  }
  total_form += parseFloat(totalOption);
  console.log('option :' +totalOption);
  //document.getElementById('finalForm').innerHTML ="Total : "+total_form+'  €' ;
  document.getElementById('titre_page').innerHTML = 'Choix des Garantie';
}

function calcul()
{
  var id = document.querySelector('#marque_id').value;
  var prix_total_vehicule = document.querySelector('#prix_total_vehicule_'+id).value;
  var totalOption_out = document.querySelector('#prixFinal').value;
  var totalGarantie = document.querySelector('#prixFinalGarantie').value;
  var totalform = Number(prix_total_vehicule) + Number(totalOption_out) + Number(totalGarantie) + Number(document.getElementById('prixLieuDepartGet').value) + Number(document.getElementById('prixLieuRetourGet').value);
  document.querySelector('#TotalTTC').value = totalform;

  var option_ids = document.querySelector('#idFinal').value;
  var id_conducteur_supp = 1;
  for(var y = 0 ; y<= option_ids.length; y++)
  {
    if(option_ids[y] == 2){
      console.log("id_optionIds = "+option_ids[y]);
      var form_conducteur_supp =
        '<br>\
        <h2 class="fs-title col-md-12" style="margin: 50px auto;">Infos Conducteur Supplementaire N° '+id_conducteur_supp+'</h2>\
        <div class="col-md-4">\
          <label>Nom\
          <input type="text" class="form-control" id="nom_supp'+id_conducteur_supp+'" name="nom'+id_conducteur_supp+'" required> </label>\
        </div>\
        <div class="col-md-4">\
          <label>Prénom\
          <input type="text" class="form-control" id="prenom_supp'+id_conducteur_supp+'" name="prenom'+id_conducteur_supp+'" required> </label>\
        </div>\
        <div class="col-md-4">\
          <label>N° Permis\
          <input type="number" class="form-control" id="numero_permis_supp'+id_conducteur_supp+'" name="numero_permis'+id_conducteur_supp+'" required> </label>\
        </div>\
        <div class="col-md-6">\
          <label>Date Délivrance \
          <input type="date" class="form-control" id="date_delivrance_supp'+id_conducteur_supp+'" name="date_delivrance'+id_conducteur_supp+'" required> </label>\
        </div>\
        <div class="col-md-6">\
          <label>Lieu de Délivrance\
          <input type="text" class="form-control" id="lieu_delivrance_supp'+id_conducteur_supp+'" name="lieu_delivrance'+id_conducteur_supp+'" required> </label>\
        </div>'
        $('.list-unstyled').append(form_conducteur_supp);
        id_conducteur_supp ++
    }
  }
  $('.nb_conducteurs').append('<input type="hidden" id="nb_conducteurs" name="nb_conducteurs" value ="'+id_conducteur_supp+'">');

  if (totalGarantie == "") {
   totalGarantie = 0;
  }
  //total_form += parseFloat(totalGarantie);
  //console.log('Garantie :' +totalGarantie);
  document.getElementById('finalForm').innerHTML ="Total : "+totalform+'  €' ;
  // document.getElementById('total_p').innerHTML =total_form+'  €' ;

  document.getElementById('titre_page').innerHTML = 'Infos Client';
}
function moyenPaiementGet(gateway)
{
  //console.log(gateway);
  //document.getElementById('gatewayGet').innerHTML = gateway;
}

function recap()
{
  $('#nav_step').hide();
  // var nameOp_out = document.querySelector('#nameOp').value;
  var days_out = document.querySelector('#days').value;
  console.log("days_out_recap "+days_out);
  var finalForm_out = document.querySelector('#finalForm').value;
  // var prix_lieu_depart_out = document.querySelector('#prix_lieu_depart').value;
  // var prix_lieu_retour_out = document.querySelector('#prix_lieu_retour').value;
  var totalOption_out = document.querySelector('#prixFinal').value;
  var totalGarantie_out = document.querySelector('#prixFinalGarantie').value;
  var prenom = document.querySelector('#prenom').value;
  var nom = document.querySelector('#nom').value;
  var numero_permis = document.querySelector('#numero_permis').value;
  var adresse = document.querySelector('#adresse').value;
  var ville = document.querySelector('#ville').value;
  var cpostal = document.querySelector('#cpostal').value;
  var pays = document.querySelector('#pays').value;
  var telephone = document.querySelector('#telephone').value;
  var email = document.querySelector('#email').value;
  var nb_adultes = document.querySelector('#nb_adultes').value;
  var nb_enfants = document.querySelector('#nb_enfants').value;
  var nb_bebes = document.querySelector('#nb_bebes').value;
  var infos_internes = document.querySelector('#infos_internes').value;
  var prix_sur_place = document.querySelector('#prix_sur_place').value;
  console.log('prix_sur_place = '+prix_sur_place);

  if(prix_sur_place != null)
  {
    var reste_a_payer = total_form - prix_sur_place;
    console.log(total_form);
    document.getElementById('prix_sur_place_out').innerHTML = prix_sur_place +' €';
    //
    var reste_a_payer_out = $('<strong style="position: relative;left: -5px;">Reste à payer</strong><span>'+reste_a_payer+ ' €</span>');
    $('#reste_a_payer').append(reste_a_payer_out);
  }else{
    $("#div_paiement_sur_place").attr("style","display: none;")
    $("#div_reste_a_payer").attr("style","display: none;")
  }
  ////////////////////
  var gateway = document.querySelector('#gatewayGet').innerHTML;
  // var mode_paiement = document.querySelector('#paiement').value;
   console.log(gateway);
  /////////
  // console.log('nom_gateway = '+gateway);
  //  if (mode_paiement == 0) {
  //    mode_paiement = "paiement de la totalité de la commande"
  //  }else
  //   {
  //    mode_paiement = "paiement de 30% de la commande ("+ total_form*0.3 +") maintenant , puis "+ total_form - (total_form*0.3)+"lors de la recuperation du vehicule";
  //   }
  // console.log(mode_paiement);
  // $('#total_p').append(finalForm_out);

  var show_total_option = $('<strong style="position: relative;left: -5px;">TOTAL</strong><span>'+totalOption_out+ ' €</span>');
  $('#totalOption_out').append(show_total_option);
  var show_total_garantie = $('<strong style="position: relative;left: -5px;">TOTAL</strong><span>'+totalGarantie_out+ ' €</span>');
  $('#totalGarantie_out').append(show_total_garantie);
  var totalTTC = $('<strong style="position: relative;left: -5px;">TOTAL TTC</strong><span>'+total_form+ ' €</span>');
  $('#total_TTC').append(totalTTC);

  var tab_out = $('\
  <tr>\
    <td>\
      <strong class="float-left">Nom</strong>\
        <div class="float-right">'+nom+'</div>\
    </td>\
      <td></td>\
  </tr>\
  <tr>\
    <td>\
      <strong class="float-left">Prénom</strong>\
      <div class="float-right">'+prenom+'</div>\
      </td><td>\
    </td>\
  </tr>\
  <tr>\
    <td>\
      <strong class="float-left">Email</strong>\
      <div class="float-right">'+email+'</div>\
      </td><td>\
    </td>\
  </tr>\
  <tr>\
    <td>\
      <strong class="float-left">Téléphone</strong>\
      <div class="float-right">'+telephone+'</div>\
      </td><td>\
    </td>\
  </tr>\
  <tr>\
    <td>\
      <strong class="float-left">Adresse</strong>\
      <div class="float-right">'+adresse+ ' '+ville +' '+cpostal+' '+pays+'</div>\
      </td><td>\
    </td>\
  </tr>\
  <tr>\
    <td>\
      <strong class="float-left">Information supplementaires</strong>\
      <div class="float-right">'+infos_internes+'</div>\
    </td>\
    <td></td>\
  </tr>');
  $('#info_client_tab').append(tab_out);

  //Test recuperation conducteur supp
  var max_conducteur_supp = document.querySelector('#nb_conducteurs').value
  console.log("Max SUPP = "+max_conducteur_supp)
  if(max_conducteur_supp !=null)
  {
    for(var s=1 ; s<=max_conducteur_supp-1; s++)
    {
      $('#HaveSupp').append('\
      <div class="col-md-6">\
        <div class="card" style="margin-bottom: 20px;">\
          <div class="card-body">\
            <div class="block">\
              <h4 class="headrer-title"> Conducteur supplementaire(s) N°'+s+'</h4>\
              <div class="table-responsive">\
                <table class="table mb-0">\
                  <tbody id="recap_supp">\
                    <tr>\
                      <td>\
                        <strong class="float-left">Nom</strong>\
                        <div class="float-right">'+document.querySelector('#nom_supp'+s).value+'</div>\
                    </td>\
                    <td></td>\
                    </tr>\
                    <tr>\
                      <td>\
                        <strong class="float-left">Prenom</strong>\
                        <div class="float-right">'+document.querySelector('#prenom_supp'+s).value+'</div>\
                    </td>\
                    <td></td>\
                    </tr>\
                    <tr>\
                      <td>\
                        <strong class="float-left">N° permis</strong>\
                        <div class="float-right">'+document.querySelector('#numero_permis_supp'+s).value+'</div>\
                    </td>\
                    <td></td>\
                    </tr>\
                    <tr>\
                      <td>\
                        <strong class="float-left">Date de délivrance</strong>\
                        <div class="float-right">'+document.querySelector('#date_delivrance_supp'+s).value+'</div>\
                      </td>\
                      <td></td>\
                    </tr>\
                    <tr>\
                      <td>\
                        <strong class="float-left">Lieu de délivrance</strong>\
                        <div class="float-right">'+document.querySelector('#lieu_delivrance_supp'+s).value+'</div>\
                      </td>\
                      <td></td>\
                    </tr>\
                </tbody>\
                </table>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
        '
      )
    }
  }
  else{
    $("#HaveSupp").attr("style","display: none;")
  }


  document.getElementById('moyen_paiement').innerHTML = gateway;
  // document.getElementById('mode_paiement').innerHTML = mode_paiement;
  document.getElementById('days_out').innerHTML = days_out + ' Jours';


  document.getElementById('totalTTC_controller').value = total_form;

}


/// Transition Next
$.easing.jswing = $.easing.swing;

    $.extend($.easing,
    {
    def: 'easeOutQuad',
    swing: function (x, t, b, c, d) {
            //alert($.easing.default);
            return $.easing[$.easing.def](x, t, b, c, d);
        },
        easeInQuad: function (x, t, b, c, d) {
            return c*(t/=d)*t + b;
        },
        easeOutQuad: function (x, t, b, c, d) {
            return -c *(t/=d)*(t-2) + b;
        },
        easeInOutQuad: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t + b;
            return -c/2 * ((--t)*(t-2) - 1) + b;
        },
        easeInCubic: function (x, t, b, c, d) {
            return c*(t/=d)*t*t + b;
        },
        easeOutCubic: function (x, t, b, c, d) {
            return c*((t=t/d-1)*t*t + 1) + b;
        },
        easeInOutCubic: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t*t + b;
            return c/2*((t-=2)*t*t + 2) + b;
        },
        easeInQuart: function (x, t, b, c, d) {
            return c*(t/=d)*t*t*t + b;
        },
        easeOutQuart: function (x, t, b, c, d) {
            return -c * ((t=t/d-1)*t*t*t - 1) + b;
        },
        easeInOutQuart: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
            return -c/2 * ((t-=2)*t*t*t - 2) + b;
        },
        easeInQuint: function (x, t, b, c, d) {
            return c*(t/=d)*t*t*t*t + b;
        },
        easeOutQuint: function (x, t, b, c, d) {
            return c*((t=t/d-1)*t*t*t*t + 1) + b;
        },
        easeInOutQuint: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
            return c/2*((t-=2)*t*t*t*t + 2) + b;
        },
        easeInSine: function (x, t, b, c, d) {
            return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
        },
        easeOutSine: function (x, t, b, c, d) {
            return c * Math.sin(t/d * (Math.PI/2)) + b;
        },
        easeInOutSine: function (x, t, b, c, d) {
            return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
        },
        easeInExpo: function (x, t, b, c, d) {
            return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
        },
        easeOutExpo: function (x, t, b, c, d) {
            return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
        },
        easeInOutExpo: function (x, t, b, c, d) {
            if (t==0) return b;
            if (t==d) return b+c;
            if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
            return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
        },
        easeInCirc: function (x, t, b, c, d) {
            return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
        },
        easeOutCirc: function (x, t, b, c, d) {
            return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
        },
        easeInOutCirc: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
            return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
        },
        easeInElastic: function (x, t, b, c, d) {
            var s=1.70158;var p=0;var a=c;
            if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
            if (a < Math.abs(c)) { a=c; var s=p/4; }
            else var s = p/(2*Math.PI) * Math.asin (c/a);
            return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
        },
        easeOutElastic: function (x, t, b, c, d) {
            var s=1.70158;var p=0;var a=c;
            if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
            if (a < Math.abs(c)) { a=c; var s=p/4; }
            else var s = p/(2*Math.PI) * Math.asin (c/a);
            return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
        },
        easeInOutElastic: function (x, t, b, c, d) {
            var s=1.70158;var p=0;var a=c;
            if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
            if (a < Math.abs(c)) { a=c; var s=p/4; }
            else var s = p/(2*Math.PI) * Math.asin (c/a);
            if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
            return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
        },
        easeInBack: function (x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c*(t/=d)*t*((s+1)*t - s) + b;
        },
        easeOutBack: function (x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
        },
        easeInOutBack: function (x, t, b, c, d, s) {
            if (s == undefined) s = 1.70158;
            if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
            return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
        },
        easeInBounce: function (x, t, b, c, d) {
            return c - $.easing.easeOutBounce (x, d-t, 0, c, d) + b;
        },
        easeOutBounce: function (x, t, b, c, d) {
            if ((t/=d) < (1/2.75)) {
                return c*(7.5625*t*t) + b;
            } else if (t < (2/2.75)) {
                return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
            } else if (t < (2.5/2.75)) {
                return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
            } else {
                return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
            }
        },
        easeInOutBounce: function (x, t, b, c, d) {
            if (t < d/2) return $.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
            return $.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
        }
    });

    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale('+scale+')',
                //'position': 'fixed'
            });
            next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 600,
            complete: function(){
            current_fs.hide();
            animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
        });
    $(".previous").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale('+scale+')',
            });
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            },
            duration: 600,
            complete: function(){
            current_fs.hide();
            animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function(){
        return false;
    })


/* Quantity button */
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fa fa-caret-up"></i></div><div class="quantity-button quantity-down"><i class="fa fa-caret-down"></i></div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});
