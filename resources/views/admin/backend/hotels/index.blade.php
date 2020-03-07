@extends('admin.layouts.app')
<link href="{{asset('themes/css/drag_and_drop.css')}}" rel="stylesheet" type="text/css">
@section('title', 'Hotel')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Hotel</h2>
            <a class="btn btn-primary float-right"  href="{{ route('hotel.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.hotels.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <script src="{{ asset('themes/js/drag_and_drop.js')}}"></script>

@endsection