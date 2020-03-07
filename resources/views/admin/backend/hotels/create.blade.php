@extends('admin.backend.hotels.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Hotel</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('hotel.index') }}"> Back</a>
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
   
<form action="{{ route('hotel.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Qty Room:</strong>
                <input type="number" name="number_of_rooms" class="form-control" placeholder="Room Qty">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Description :</strong>
                <script src="https://cdn.tiny.cloud/1/qm3arpzk5x1cs4prnogo3cfnatkkjoe6ws7fvh5uyjtwbdag/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <textarea>
              </textarea>
                <script>
                    tinymce.init({
                        selector: 'textarea',
                        plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                        toolbar_drawer: 'floating',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Shero',
                    });
                </script>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">

                <strong>Image:</strong>
                <input class="form-control" type="file" id="files" name="image" multiple><br/>
                    <div class="file" id="selectedFiles"></div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <strong>City:</strong>
                <select class="form-control " name="city"  id="city" autofocus>
                    <option></option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"{{ old('city')==$city->id ? ' selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                </select>
                @if ($errors->has('city'))
                    <span class="help-block">
                    <strong>{!! $errors->first('city') !!}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('roomtype') ? ' has-error' : '' }}">
                <strong>Room Type:</strong>
                <select class="form-control " name="roomtype"  id="roomtype" autofocus>
                    <option></option>
                    @foreach($roomtype as $room)
                        <option value="{{ $room->id }}"{{ old('roomtype')==$room->id ? ' selected' : '' }}>{{ $room->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('roomtype'))
                    <span class="help-block">
                    <strong>{!! $errors->first('roomtype') !!}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('facility') ? ' has-error' : '' }}">
                <strong>Facility:</strong>
                <select class="form-control select2" name="facility[]" multiple="multiple" id="facility" autofocus>
                    <option></option>
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}"{{ old('facility')==$facility->id ? ' selected' : '' }}>{{ $facility->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('facility'))
                    <span class="help-block">
                    <strong>{!! $errors->first('facility') !!}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-12">
            <strong>Price:</strong>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" id="amount" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Hotel Stars:</strong>
                <input type="number" name="hotel_stars" class="form-control" placeholder="Hotel Stars">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Location Detail:</strong>
                <input type="text" name="location_detail" class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection