@extends("layouts.master")
@section("title","create country")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create country</h1>
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
                            <a href="{{ route('countries.index') }}" class="btn btn-light btn-sm">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.store') }}">
                        @csrf

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="country">{{ __('Country') }}</label>

                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" placeholder="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="country_code">{{ __('Country code') }}</label>

                                <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" placeholder="Country code" autofocus>

                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-sm mb-3">
                                    Create country
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