@extends('admin.backend.cities.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Cities</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('city.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('city.store') }}" method="POST">
    @csrf
<div class="card">
    <div class="ml-2 mr-2 row">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class=" col-md-6">
            <strong>Province:</strong>
            <select class="form-control select2" name="province" autofocus>
                <option></option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}"{{ old('province')==$province->id ? ' selected' : '' }}>{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>

   
</form>
@endsection