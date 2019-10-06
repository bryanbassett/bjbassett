@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Categories</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('add.category.post') }}">
                    @csrf
                    <div class="form-row">
                    <div class="input-group mb-3">
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control " placeholder="Category Name" aria-label="name" >
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="section" class="form-control" placeholder="Section (1-3)" aria-label="section" >
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="weight" class="form-control" placeholder="Weight" aria-label="weight" >
                        </div>
                        <div class="form-group col-md-2">
                            <select class="form-control">
                                <option value="" disabled selected>Select Parent (optional)</option>
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Add Category</button>
                            </div>
                        </div>





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

                    <table class="table table-bordered">
                        <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Weight</th>
                        <th>Parent</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $ca)
                        <tr>
                            <td>{{ $ca->name }}</td>
                            <td>{{ $ca->section }}</td>
                            <td>{{ $ca->weight }}</td>
                            <td>{{ optional($ca->parent)->name }}</td>
                            <td><a href="/editcategory/{{$ca->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

