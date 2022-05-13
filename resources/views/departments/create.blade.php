@extends("layouts.master")
@section("title","create department")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create department</h1>
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
                            <a href="{{ route('departments.index') }}" class="btn btn-light btn-sm">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="department">{{ __('Department') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="department" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat btn-sm mb-3">
                                    Create department
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