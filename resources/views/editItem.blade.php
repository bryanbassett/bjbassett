@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Item</h1>

        <div class="card">
            <div class="card-header">
                <h3>Edit {{$item->name}}</h3>
                <form method="POST" action="{{ route('update.item.post',$item) }}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="input-group mb-3">
                        <input type="hidden" name="id" class="form-control" placeholder="ID" aria-label="id" value=" {{$item->id}}" >
                        <input type="textarea" name="fullContent" class="form-control" placeholder="Content" aria-label="name" value=" {{$item->fullContent}}" >

                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Save {{$item->name}}</button>
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

