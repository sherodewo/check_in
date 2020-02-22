@extends('admin.backend.districts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Districts</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('district.index') }}"> Back</a>
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
{{--{{dd($cityModel->where('province_id', '1')->get() )}}--}}

<form action="{{ route('district.store') }}" method="POST">
    @csrf

    <div class="card">
        <div class="ml-2 mr-2 row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                    <strong>Province:</strong>
                    <select class="form-control select2" name="province" data-placeholder="{!! trans('label.province') !!}" id="province" autofocus>
                        <option></option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}"{{ old('province')==$province->id ? ' selected' : '' }}>{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('province'))
                        <span class="help-block">
                    <strong>{!! $errors->first('province') !!}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    <strong>City:</strong>
                    <select class="form-control select2" name="city" data-placeholder="{!! trans('label.city') !!}" id="city" autofocus>
                        <option></option>
                        @if(old('province'))
                            @foreach($cityModel->where('province_id', old('province'))->get() as $city)
                                <option value="{{ $city->id }}"{{ old('city')==$city->id ? ' selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('city'))
                        <span class="help-block">
                    <strong>{!! $errors->first('city') !!}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#province').on('change', function (e) {
            let province_id = $(this).val();
            $.ajax('{{ route('cities.byProvinceId') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "province_id": province_id
                },
                success: function (data, status, xhr) {
                    $('#city').html('');
                    data = $.parseJSON(data);
                    console.log(data);
                    $.each(data, function (key, value) {
                        $('#city').append('' +
                            '<option value='+value.id+'>'+value.name+'</option>'
                        )
                    });
                },
                error: function (jqXhr, textStatus, errorMessage) {
                   console.log(errorMessage);
                }
            });
        });
    </script>
</form>
@endsection