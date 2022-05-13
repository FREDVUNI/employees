@extends("layouts.master")
@section("title","Edit ".$city->name)

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit {{$city->name}}</h1>
                </div>
                </div>
            </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-right">
                            <a href="{{ route('cities.index') }}" class="btn btn-light btn-sm">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method("PATCH")

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="city">{{ __('city') }}</label>

                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $city->name ?? old('city') }}" placeholder="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="state">{{ __('state') }}</label>
                                <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                                    <option value="{{$city->state_id}}">{{ $city->state->name }}</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-sm mb-3">
                                    Edit city
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection