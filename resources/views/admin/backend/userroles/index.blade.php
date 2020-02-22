@extends('admin.layouts.app')
@section('title', 'userrole')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">User Roles</h2>
            <a class="btn btn-primary float-right"  href="{{ route('userrole.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.backend.userroles.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection