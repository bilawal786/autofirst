<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Auto First</title>

    <link rel="stylesheet" href="{{asset('backend/assets/fonts/stylesheet.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
          type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap-select.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/css/jquery-confirm.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/css/dashboard.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('backend/summernote/summernote-bs4.min.css')}}">

    <style>.pagination-info{display:none;} .table-responsive, #calendar{padding: 10px;} td, .th-inner{text-align: center;}</style>
    @stack('styles')

</head>

<body>

@include('includes.navbar')
<div class="main-content" id="panel">
    @include('includes.header')
    @include('includes.page-header')
    <div class="container-fluid mt--6">
        @yield('content')
    </div>
    <script src="{{asset('backend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/pickadate/translations/fr_FR.js')}}"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/locale/bootstrap-table-fr-FR.min.js"></script>
    <script src="{{asset('backend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Summernote -->
    <script src="{{asset('backend/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Voulez-vous supprimer?",
                text: "Une fois supprimé, ce sera définitivement supprimé!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Données sécurisées!");
                    }
                });
        });

    </script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@stack('scripts')
</body>
</html>
