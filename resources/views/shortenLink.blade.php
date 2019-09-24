@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bassett Link Shortener</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="URL" >
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug" aria-label="Slug" >
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Generate Link</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered  table-responsive table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th width="100%">Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->slug) }}" target="_blank">{{ route('shorten.link', $row->slug) }}</a></td>
                            <td>{{ $row->link }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

