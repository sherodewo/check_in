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
   
<form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
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
                <textarea name="description">
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
            <strong>Image :</strong>
            <div class="input-group control-group increment" >
                <input type="file" id="file" name="image[]" class="form-control">
                <div class="file" id="selectedFiles"></div>
                <div class="input-group-btn">
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" id="file" name="image[]" class="form-control">
                    <div class="file" id="selectedFiles"></div>
                    <div class="input-group-btn">
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".btn-success").click(function(){
                    var html = $(".clone").html();
                    $(".increment").after(html);
                });
                $("body").on("click",".btn-danger",function(){
                    $(this).parents(".control-group").remove();
                });
            });
        </script>
        <div class="col-6">
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <strong>City:</strong>
                <select class="form-control " name="city_id"  id="city" autofocus>
                    <option></option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"{{ old('city')==$city->id ? ' selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                </select>
                @if ($errors->has('city'))
                    <span class="help-block">
                    <strong>{!! $errors->first('city') !!}</strong>
                    <strong>{!! $errors->first('city') !!}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group{{ $errors->has('roomtype') ? ' has-error' : '' }}">
                <strong>Room Type:</strong>
                <select class="form-control " name="room_type_id"  id="roomtype" autofocus>
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
                <select class="form-control select2" name="facility_id[]" multiple="multiple" id="facility" autofocus>
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
                    <input type="text" name="price" id="money"  data-type="currency" class=" form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            <script type="text/javascript">
                $(document).ready(function(){

                    // Format mata uang.
                    $( '.uang' ).mask('000.000.000', {reverse: true});

                })
            </script>
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
        <div class="col-6">
            <div class="form-group">
                <strong>Postal Code:</strong>
                <input type="text" name="postal_code" class="form-control" placeholder="Zip Code">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="number" name="phone_number" class="phone form-control" placeholder="Phone Number">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Check In:</strong>
                <input type="time" name="check_in_time" class="phone form-control" placeholder="Phone Number">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Check In:</strong>
                <input type="time" name="check_out_time" class="phone form-control" placeholder="Phone Number">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>Status:</strong>
                <div class="display-item">
                    <label class="switch">
                        <input type="checkbox" id="status" name="status" value=1>
{{--                        <script>--}}
{{--                            $('#status').click(function () {--}}
{{--                                console.log($('#status').val())--}}
{{--                            })--}}
{{--                        </script>--}}
                        <span class="switch-field"></span>
                        <span class="switch-text"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection