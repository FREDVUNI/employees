@extends("layouts.master")
@section("title","departments")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Departments</h1>
                </div>
                </div>
            </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    @if(Session::has("success"))
                        <div class="alert alert-success">{{ Session::get("success") }}</div>
                    @endif
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-right d-flex">
                            <form action="{{ route("departments.index") }}" method="GET">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" id="search" class="form-control" placeholder="search departments...">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-primary">search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="col">
                                <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">create</a>
                            </div>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td class="d-flex">
                                <a href="{{ route('departments.edit',$department->id) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route("departments.destroy",$department->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <li class="text-danger">There are no available departments</li>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection