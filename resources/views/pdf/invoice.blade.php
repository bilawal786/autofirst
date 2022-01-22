<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facture #{{$data->id}}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td valign="top"><img src="{{asset($gs->logo)}}" alt="" width="150"/>
            <h3>AUTO FIRST LOCATION
            </h3>
            Tel: {{ $gs->phone }}<br>
            {{ $gs->address }}<br>
            SIRET : 38153471800022<br><br>
        </td>
        <td align="right">
            <h3>{{$data->fname}} {{$data->lname}}
            </h3>
            <pre>
            Email : {{$data->email}}
            Tel: {{$data->phone}}
                {{$data->address}}
                {{$data->postal_code}} {{$data->city}}
                {{$data->country}}
          </pre>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>Durée : </strong>{{$data->days}} Jours</td>
    </tr>

</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>Description</th>
        <th>Prix</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Départ : {{$data->start_point}}</td>

        <td align="right">0€</td>
        <td align="right">0€</td>
    </tr>
    <tr>
        <td>Retour : {{$data->end_point}}</td>
        <td align="right" >0€</td>
        <td align="right">0€</td>
    </tr>
    <tr>
        <td align="left">Reservation du vehicule {{$data->vehicle->marque->name??''}} {{$data->vehicle->modal->name??''}} Du <strong>{{\Carbon\Carbon::parse($data->departure_date)->format('d/m/Y')}}</strong> à <strong>{{$data->departure_time}}</strong>
            Au <strong>{{\Carbon\Carbon::parse($data->return_date)->format('d/m/Y')}}</strong> à <strong>{{$data->return_time}}</strong> </td>
        <td align="right"></td>
        <td align="right">{{$data->totalamount}}€</td>
    </tr>
    </tbody>
    <tfoot>

    <tr>
        <td colspan="1"></td>
        <td align="right"></td>
        <td align="right" class="gray">{{$data->totalamount}}€</td>
    </tr>
    </tfoot>
</table>

</body>
</html>
