@extends('admin.backend.userroles.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New User Roles</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('userrole.index') }}"> Back</a>
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
   
<form action="{{ route('userrole.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User:</strong>
                <select class="form-control" name="user_id">
                    <option></option>
                    @foreach($user as $users)
                        <option value="{{ $users->id }}" {{old('user_id') == $users->id ? 'selected' : ''}}>{{$users->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                <select class="form-control" name="role_id">
                    <option></option>
                    @foreach($role as $roles)
                        <option value="{{ $roles->id }}" {{old('role_id') == $roles->id ? 'selected' : ''}}>{{$roles->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection