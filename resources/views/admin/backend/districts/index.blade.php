@extends('admin.layouts.app')
@section('title', 'District')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">District</h2>
            <a class="btn btn-primary float-right"  href="{{ route('district.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.districts.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection