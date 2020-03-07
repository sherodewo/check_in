<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('themes/arch/architectui-html-free/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('themes/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="{{asset('themes/css/custom.css')}}">
<link href="{{asset('themes/css/drag_and_drop.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@stack('styles')
