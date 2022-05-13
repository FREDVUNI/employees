@extends("layouts.master")
@section("title","Edit ".$user->username)

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit {{ $user->username }}</h1>
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
                            <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',$user->id) }}">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="username">{{ __('Username') }}</label>

                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username',$user->username) }}" placeholder="Username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="first_name">{{ __('First Name') }}</label>

                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',$user->first_name) }}" placeholder="First name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="last_name">{{ __('Last Name') }}</label>

                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$user->last_name) }}" placeholder="Last name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="email">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" placeholder="Email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat mb-3">
                                    Update
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