@extends('admin.backend.districts.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show District</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('district.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="card shadow">
    <div class="row mb-3 mt-2 ml-2 mr-2">
        <div class="col-6">
            <label>Name</label>
            <div class="form-control">
                {{$data->name}}
            </div>
        </div>
        <div class="col-6">
            <label>Province</label>
            <div class="form-control">
                {{$data->province}}
            </div>
        </div>
        <div class="col-6">
            <label>City</label>
            <div class="form-control">
                {{$data->city}}
            </div>
        </div>

    </div>
</div>
@endsection
