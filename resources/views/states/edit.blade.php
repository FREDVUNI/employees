@extends("layouts.master")
@section("title","Edit ".$state->name)

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit {{$state->name}}</h1>
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
                            <a href="{{ route('states.index') }}" class="btn btn-light btn-sm">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('states.update',$state->id) }}">
                        @csrf
                        @method("PATCH")

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="state">{{ __('State') }}</label>

                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $state->name ?? old('state') }}" placeholder="state" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="country">{{ __('Country') }}</label>
                                <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                                    <option value="{{$state->id}}">{{ $state->country->name }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-sm mb-3">
                                    Edit state
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