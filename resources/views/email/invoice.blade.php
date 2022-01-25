<!DOCTYPE html>
<html>


<body style="background-color: #f4f4f4;">
<p>
    Bonjour, <br>

    Votre réservation est terminée vous devez signer le contrat <a target="_blank" href="{{route('signature', ['id' => $data->id])}}">cliquez ici</a>

    <br>

    Auto First Location<br>

    Facture #{{$data->id}}
</p>
</body>

</html>

