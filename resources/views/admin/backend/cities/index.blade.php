@extends('admin.layouts.app')
@section('title', 'City')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Cities</h2>
            <a class="btn btn-primary float-right"  href="{{ route('city.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.cities.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection