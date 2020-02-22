@extends('admin.layouts.app')
@section('title', 'Room Type')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Room Type</h2>
            <a class="btn btn-primary float-right"  href="{{ route('roomtype.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.roomtypes.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection