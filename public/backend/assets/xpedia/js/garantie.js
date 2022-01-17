totGarantie=0;
//FinalPricegarantie =0;

finalNameGarantie = " ";
garantieNames=[];
idFinalGarantie=[];



 function addGarantie(id){
    event.preventDefault();
    var garantie_id = $('#id_garantie'+id).val();
    var nb_max_resa_ga = $('#nb_max_resa_ga'+id).val();
    console.log('nb_max_resa_ga = '+nb_max_resa_ga);
    cpt_upGa = $('#cpt_upGa'+id).val();
    cpt_upGa ++;
    console.log("compteur ",cpt_upGa);
    if (cpt_upGa > 1) {
      console.log("error");
    }else{

  // Recuperation des donnée (prix_par_jour & name)
    var namGarantie = document.querySelector('#nameGarantie_'+id);
    price = document.querySelector('#priceGarantie_'+id);
    priceT = 0;
    priceT += parseFloat(price.value);

    //envoyer ce li dans checkoutCard final
    var li =$('<li id="nameGa'+id+'">'+namGarantie.value+' '+price.value+'€ </li><input type="hidden" id="finalNameGarantie'+id+'" value="'+namGarantie.value+'"><input type="hidden" id="id_outGa'+id+'" value="'+garantie_id+'">');
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
  }

};

//fonction suprresion nameGarantiePost par name
function arrayUnset(array, value){
  array.splice(array.indexOf(value), 1);
}

function removeGarantie(id){
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

  //decrementation du prix
  price = document.querySelector('#priceGarantie_'+id);
  console.log("priceT remove:",price.value);
  totGarantie-=price.value;
  console.log("Total : ",totGarantie);

  //envoie 
  document.getElementById('totalGarantie').innerHTML = totGarantie+" €  ";
  //document.getElementById('garantieNames').innerHTML = garantieNames;
  document.getElementById('idFinalGarantie').value = idFinalGarantie;
  document.getElementById('prixFinalGarantie').value = totGarantie;
  //modifie le prix sur la vu (price)
}
};



