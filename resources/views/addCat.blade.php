@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Categories</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('add.category.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name" aria-label="name" >
                        <input type="text" name="section" class="form-control" placeholder="Select Section" aria-label="section" >
                        <input type="text" name="weight" class="form-control" placeholder="Enter Weight" aria-label="weight" >
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table class="table table-bordered  table-responsive table-sm">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Weight</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $ca)
                        <tr>
                            <td>{{ $ca->Name }}</td>
                            <td>{{ $ca->Section }}</td>
                            <td>{{ $ca->Weight }}</td>
                            <td><a href="/editcategory/{{$ca->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

