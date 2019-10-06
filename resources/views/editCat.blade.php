@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('update.category.post',$cat) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="input-group mb-3">
                        <input type="hidden" name="id" class="form-control" placeholder="ID" aria-label="id" value=" {{$cat->id}}" >
                        <input type="text" name="name" class="form-control" placeholder="Category Name" aria-label="name" value=" {{$cat->name}}" >
                        <input type="text" name="section" class="form-control" placeholder="Section" aria-label="section" value="{{$cat->section}}" >
                        <input type="text" name="weight" class="form-control" placeholder="Weight" aria-label="weight" value="{{$cat->weight}}">
                        <select>

                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>
            @if (Session::has('success'))
            <div class="card-body">


                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>

            </div>
            @endif
        </div>

    </div>

@endsection

