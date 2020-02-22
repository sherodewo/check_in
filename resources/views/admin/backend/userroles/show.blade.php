@extends('admin.backend.userroles.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show User role</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('userrole.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="card shadow">
    <div class="row mb-3 mt-2 ml-2 mr-2">
        <div class="col-6">
            <label>user</label>
            <div class="form-control">
                {{$data->user_id}}
            </div>
        </div>
        <div class="col-6">
            <label>role</label>
            <div class="form-control">
                {{$data->role_id}}
            </div>
        </div>

    </div>
</div>
@endsection
