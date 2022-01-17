function dayDiff(d1, d2)
{
  d1 = d1.getTime() / 86400000;
  d2 = d2.getTime() / 86400000;
  return new Number(d2 - d1).toFixed(0);
}
if(document.getElementById('date_depart')){
var d11 = new Date(document.getElementById("date_depart").value);
var d12 = new Date(document.getElementById("date_retour").value);
document.getElementById('duration').innerHTML = dayDiff(d11, d12)+' Jours';
var duration_r = dayDiff(d11, d12);
window.localStorage.setItem('duration_r',duration_r);
}

    window.addEventListener("load", function(){

        // create one global XHR object for CT requests
        var micrositeBaseURL = "/car_booking";

        //Set up the location fields for autocompletion

        //Handle the form Submission
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

        //Handle checkbox/return location field
        // document.getElementById("myCheck").addEventListener("click", function(evt) {
        //     //Update UI based on checkbox
        //     document.getElementById("agence_retour").style.display = (this.checked) ? "block" : "none";
        //     document.getElementById("myCheck-form").style.display = (this.checked) ? "none" : "block";
        //     //document.getElementById("pickup-location-container").setAttribute('class', (this.checked) ? "col-md-5" : "col-md-5");
        // });


    });
