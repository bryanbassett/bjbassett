@extends('layouts.app')

@section('content')

  <?php use App\Item;$ItemX = new Item();?>
  <?php use App\Settings;$Setting = new Settings();?>

    <div class="container">
        <div class="jumbotron">


            <h1 class="display-1 text-center">
                <a href="#mailgo" data-address="admin" data-domain="bjbassett.org">Bryan James Bassett</a>
            </h1>
            @if( ($Setting->find(1))->enabled == 0)
            <p class="lead text-center">
                Portfolio currently being modified, check back in five minutes.
            </p>
            @else
            <p class="lead text-center">
               Application Developer
            </p>
            @endif
        </div>
    </div>
    @if( ($Setting->find(1))->enabled == 0 && Auth::check())
        <div class="alert alert-primary" role="alert">
            FYI: The following content is currently being hidden.
        </div>
        @endif
    @if( ($Setting->find(1))->enabled == 1 || Auth::check())
        <div class="container">
            <div class="row first-row">
                <div class="col-sm sec-1">
                    @foreach($section1 as $sec1)
                        @if($sec1->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec1->name  }}
                                </h3>
                                <ul>

                                    @foreach($sec1->allItems() as $item)

                                        <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                {!! $ItemX->figureIt($it_id,$item2) !!}
                                            @endforeach
                                        </li>

                                    @endforeach
                                </ul>
                                @foreach($sec1->children as $children1)
                                    <h4>
                                        {{ $children1->name }}
                                    </h4>
                                    <ul>
                                        @foreach($children1->allItems() as $item)
                                            <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    {!! $ItemX->figureIt($it_id,$item2) !!}
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                    @foreach($children1->children as $grandChildren1)
                                        <h5>
                                            {{ $grandChildren1->name }}
                                        </h5>
                                        <ul>
                                            @foreach($grandChilren1->allItems() as $item)
                                                <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        {!! $ItemX->figureIt($it_id,$item2) !!}
                                                    @endforeach
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row second-row">
                <div class="col-sm sec-2">
                    @foreach($section2 as $sec2)
                        @if($sec2->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec2->name  }}
                                </h3>
                                <ul>
                                    @foreach($sec2->allItems() as $item)
                                        <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                {!! $ItemX->figureIt($it_id,$item2) !!}
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                                @foreach($sec2->children as $children2)
                                    <h4>
                                        {{ $children2->name }}
                                    </h4>
                                    <ul>
                                        @foreach($children2->allItems() as $item)
                                            <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    {!! $ItemX->figureIt($it_id,$item2) !!}
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                    @foreach($children2->children as $grandChildren2)
                                        <h5>
                                            {{ $grandChildren2->name }}
                                        </h5>
                                        <ul>
                                            @foreach($grandChildren2->allItems() as $item)
                                                <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        {!! $ItemX->figureIt($it_id,$item2) !!}
                                                    @endforeach
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-sm sec-3">
                    @foreach($section3 as $sec3)
                        @if( $sec3->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec3->name  }}
                                </h3>
                                <ul>
                                    @foreach($sec3->allItems() as $item)
                                        <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                {!! $ItemX->figureIt($it_id,$item2) !!}
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>

                                @foreach($sec3->children as $children3)
                                    <h4>
                                        {{ $children3->name }}
                                    </h4>
                                    <ul>
                                        @foreach($children3->allItems() as $item)
                                            <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    {!! $ItemX->figureIt($it_id,$item2) !!}
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                    @foreach($children3->children as $grandChildren3)
                                        <h5>
                                            {{ $grandChildren3->name }}
                                        </h5>
                                        <ul>
                                            @foreach($grandChildren3->allItems() as $item)
                                                <li class="{{   strtolower(str_replace(' ', '_', $item->name)) }}">
                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        {!! $ItemX->figureIt($it_id,$item2) !!}
                                                    @endforeach
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    @endif

@endsection

