@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Fields</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('add.field.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Enter Field Name" aria-label="name" >
                        <input type="text" name="weight" class="form-control" placeholder="Enter Weight" aria-label="weight" >
                        <select name="cat_id">

                            <option name="cat_id" value="" disabled selected>Select Category</option>
                            @foreach ($cats as $parent)
                                <option name="cat_id" value="{{ $parent->id }}" {{ $parent->isChildless() ? '' : 'disabled' }}>{{ $parent->name }}</option>
                                @if(!$parent->isChildless())
                                    @foreach ($parent->children as $child)
                                        <option name="cat_id" value="{{ $child->id }}" {{ $child->isChildless() ? '' : 'disabled' }}>---{{ $child->name }}</option>
                                        @if(!$child->isChildless())
                                            @foreach ($child->children as $grandchild)
                                                <option name="cat_id" value="{{ $grandchild->id }}" {{ $grandchild->isChildless() ? '' : 'disabled' }}>------{{ $grandchild->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach
                        </select>
                        <select name="type">
                            <option name="type" value="" disabled selected>Select Type</option>
                            <option name="type" value="text">Text Box</option>
                            <option name="type" value="textarea">Text Area</option>
                            <option name="type" value="date">Date</option>
                            <option name="type" value="link">Link</option>
                        </select>
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

                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fields as $field)
                        <tr>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->category->name }}</td>
                            <td>{{ $field->type }}</td>
                            <td><a href="/editfield/{{$field->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

