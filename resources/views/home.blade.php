@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <p class="h5 text-center"> Total Clicks</p>
                            </div>
                            <div class="card-body">

                                <p class=" display-1 text-center">{{ $totalClicks }}</p>
                            </div>
                        </div>
<hr>

                            <table class="table table-bordered">
                                <thead class="thead-light"><tr><th scope="col">Setting</th><th scope="col">Status</th></tr></thead>
                                <tbody>
                                @foreach($settings as $setting)
                                    <tr><td>{{$setting->name}}</td><td>@if($setting->enabled==1) Enabled @else Disabled @endif</td></tr>
                                @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
