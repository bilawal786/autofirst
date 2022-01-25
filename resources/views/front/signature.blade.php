<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Signature</title>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <link href="{{asset('signature/css/jquery.signature.css')}}" rel="stylesheet">
    <style>
        .kbw-signature { width: 400px; height: 200px; }
    </style>
    <!--[if IE]>
    <script src="excanvas.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('signature/js/jquery.signature.js')}}"></script>
    <script>
        $(function() {
            var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
            $('#disable').click(function() {
                var disable = $(this).text() === 'Disable';
                $(this).text(disable ? 'Enable' : 'Disable');
                sig.signature(disable ? 'disable' : 'enable');
            });
            $('#clear').click(function() {
                sig.signature('clear');
            });
            $('#json').click(function() {
                alert(sig.signature('toJSON'));
            });
            $('#svg').click(function() {
                alert(sig.signature('toSVG'));
            });
        });
    </script>
</head>
<body>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>
<h1>Signature</h1>
<form action="{{route('signature.submit')}}" method="POST">
    @csrf
    <div id="sig"></div>
    <textarea id="signature64" name="signed" style="display: none"></textarea>
    <input type="hidden" name="id" value="{{$id}}">
    <p style="clear: both;">
        <button id="clear">Clear</button>
        <button type="submit">Submit</button>
    </p>
</form>

</body>
</html>
