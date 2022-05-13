@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg mx-auto col-md-10 col-sm-6">
                <div class="card-body">
                    <div class="text-center">
					    <span class="mb-3"><img src="../images/logo.png" alt="logo" width="70px" class="mb-3 mt-4"></span>
						<h1 class="h5 text-dark-500">Reset Password</h1>
					</div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="email">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block mb-3">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
