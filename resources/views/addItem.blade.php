@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Items</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('add.item.post') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="cat_id" id="category" class="form-control">
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($cats as $cat)
                                @if(!$cat->hasFields()->get()->isEmpty())
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif

                            @endforeach
                        </select>

                            <div id="itemForm" class="itemForm form-group {{ $errors->has('cat_id') ? 'has-error' : '' }}">
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


                    @foreach($cats as $ca)
                        @if(!$ca->hasItems()->get()->isEmpty())
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr><span class="font-weight-bold">{{ $ca->name }}</span></tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($ca->allItems() as $item)
                                            <tr>
                                            <td>{{ $item->name }}</td>
                                            <td><a href="/edititem/{{$item->id}}">Edit</a></td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        @endif
                    @endforeach

            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $=jQuery;
        $(function(ready){
            $("#category").change(function(){
                $('.itemForm').html('');
                $.ajax({
                    url: "{{ route('field.get_by_category') }}?cat_id=" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $('.itemForm').html(data.html);
                    }
                });
            });
        });
    </script>
@endsection
