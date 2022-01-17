tot=0;
FinalPrice =0;

finalName = " ";
optionNames=[];
idFinal=[];



 function addOption(id){
    event.preventDefault();
    var option_id = $('#id_option'+id).val();
    cpt_up = $('#cpt_up'+id).val();
    cpt_up ++;
    nb_max_resa = $('#nb_max_resa'+id).val();
    console.log('nb_max_resa = '+nb_max_resa)
    console.log("compteur ",cpt_up);
    if (cpt_up > nb_max_resa) {
      console.log("error");
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
  }

};

//fonction suprresion nameOptionPost par name
function arrayUnset(array, value){
  array.splice(array.indexOf(value), 1);
}

function removeOption(id){
  var option_id = $('#id_option'+id).val();
  console.log("id",option_id);
  //bloquage a l'entrée
  var optionIntput = $('#nameOp'+id+'').val();
  if (optionIntput === undefined) {
    console.log("Entrée bloquée");
  }else{
  //name remouve -> supprime li sur checkoutCard
  var nameRemove = $('#nameOp'+id);
  nameRemove.remove();
  //Retire element tableau optionNames=[];
  var namOptionPost = document.querySelector('#name_'+id);
  arrayUnset(optionNames,namOptionPost.value);
  console.log("my array = " ,optionNames);

  //Retire l'id du tab idFinal
  //id_out 
  var id_out = document.querySelector('#id_out'+id);
  arrayUnset(idFinal,id_out.value);
  console.log(idFinal);

  //decrementation du prix
  price = document.querySelector('#price_'+id);
  console.log("priceT remove:",price.value);
  tot-=price.value;
  console.log("Total : ",tot);

  //envoie 
  document.getElementById('totalOption').innerHTML = tot+" €  ";
  document.getElementById('optionNames').innerHTML = optionNames;
  document.getElementById('idFinal').value = idFinal;
  document.getElementById('prixFinal').value = tot;
  //modifie le prix sur la vu (price)
}
};

var idFinal = document.getElementById('idFinal').innerHTML = idFinal;
console.log(idFinal);

$('#submit').click(function() {
// envoie du total + tableau dans checkoutCardfinal (via carCheckout.js)
FinalPrice = tot;
finalName = optionNames;
var days = window.localStorage.getItem('duration_r');
var vehicule_id = document.getElementById('vehicule_id').value;
var prix_vehicule = document.getElementById('prix_vehicule').value;
var date_depart_r = document.getElementById('date_depart_r').value;
var date_retour_r = document.getElementById('date_retour_r').value;
var lieu_depart_r = document.getElementById('lieu_depart_r').value;
var lieu_retour_r = document.getElementById('lieu_retour_r').value;
var time_depart_r = document.getElementById('time_depart_r').value;
var time_retour_r = document.getElementById('time_retour_r').value;
var tarif_retour = document.getElementById('tarif_retour').value;
var tarif_aller = document.getElementById('tarif_aller').value;

window.location.href = "car_checkout?opName=" + finalName + "&opPrice=" + FinalPrice+ "&prix_vehicule=" + prix_vehicule+ "&days=" + days+ "&vehicule_id="+ vehicule_id+ "&tarif_retour=" + tarif_retour+ "&tarif_aller=" + tarif_aller +"&date_depart_r=" + date_depart_r +"&date_retour_r=" + date_retour_r +"&lieu_depart_r=" + lieu_depart_r +"&lieu_retour_r=" + lieu_retour_r +"&time_depart_r=" + time_depart_r +"&time_retour_r=" + time_retour_r;
});
