@extends('admin.backend.cities.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit </h2>
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
  
    <form action="{{ route('city.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">

        <div class="row ml-2 mr-2 mt-2 mb-3">
            <div class="col-6">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" value="{{ old('name')!==null ? old('name') : $data->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-6">
                <strong> Province:</strong>
                <select class="form-control select2" name="province" data-placeholder="{!! trans('label.province') !!}" autofocus>
                    <option></option>
                @foreach ($provinces as $province)
                        <option value="{{ $province->id }}"{{ old('province') ? (old('province')==$province->id ? ' selected' : '') : ($data->province_id == $province->id ? ' selected' : '') }}>{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
@endsection
