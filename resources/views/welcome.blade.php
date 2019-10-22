@extends('layouts.app')

@section('content')

  <?php use App\Item;$ItemX = new Item();?>
  <?php use App\Settings;$Setting = new Settings();?>

    <div class="container">
        <div class="jumbotron">



            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="display-1 text-hide invisible">
                            Bryan James Bassett
                        </h1>
                        <div class="topper"  >
                    </div>
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>

            @if( ($Setting->find(1))->enabled == 0)
            <p class="lead text-center">
                Portfolio currently being modified, check back later.
            </p>
            @else
            <p class="lead top-title">
               Full-Stack Developer
            </p>
            @endif
            <p class="lead ">

            @if(request()->get('pdf') == true)
                    <a href="#mailgo" data-address="bryan" data-domain="bjbassett.org">bryan@bjbassett.org</a> - <a class="mailgo" data-tel="2168028141">216.802.8141</a>
            @else
                    <a href="#mailgo" data-address="bryan" data-domain="bjbassett.org">email</a> - <a class="mailgo" data-tel="2168028141">phone</a>
            @endif

            </p>
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
                <div class="col-sm  sec-1">
                    @foreach($section1 as $sec1)
                        @if($sec1->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec1->name  }}
                                </h3>
                                <div class="{{strtolower(str_replace(' ', '_', $sec1->name)) }}">
                                    @foreach($sec1->allItems() as $item)

                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                            @endforeach
                                                <div style="clear:both"></div>
                                                @auth
                                                    <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                @endauth


                                    @endforeach
                                </div>
                                @foreach($sec1->children as $children1)
                                    <h4>
                                        {{ $children1->name }}
                                    </h4>
                                    <div class="{{strtolower(str_replace(' ', '_', $children1->name)) }}">
                                        @foreach($children1->allItems() as $item)

                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                @endforeach
                                                    <div style="clear:both"></div>
                                                    @auth
                                                        <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                    @endauth

                                        @endforeach
                                    </div>
                                    @foreach($children1->children as $grandChildren1)
                                        <h5>
                                            {{ $grandChildren1->name }}
                                        </h5>
                                        <div class="{{strtolower(str_replace(' ', '_', $grandChildren1->name)) }}">
                                            @foreach($grandChildren1->allItems() as $item)

                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                    @endforeach
                                                        <div style="clear:both"></div>
                                                        @auth
                                                            <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                        @endauth

                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row second-row">
                <div class="col-xs-12 col-sm-4   sec-2">
                    @foreach($section2 as $sec2)
                        @if($sec2->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec2->name  }}
                                </h3>
                                <div class="{{strtolower(str_replace(' ', '_', $sec2->name)) }}">
                                    @foreach($sec2->allItems() as $item)

                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                <items :item-identity="{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                            @endforeach
                                                <div style="clear:both"></div>

                                                @auth
                                                    <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                @endauth

                                    @endforeach
                                </div>
                                @foreach($sec2->children as $children2)
                                    <h4>
                                        {{ $children2->name }}
                                    </h4>
                                    <div class="{{strtolower(str_replace(' ', '_', $children2->name)) }}">
                                        @foreach($children2->allItems() as $item)

                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                @endforeach
                                                    <div style="clear:both"></div>
                                                    @auth
                                                        <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                    @endauth

                                        @endforeach
                                    </div>
                                    @foreach($children2->children as $grandChildren2)
                                        <h5>
                                            {{ $grandChildren2->name }}
                                        </h5>
                                        <div class="{{strtolower(str_replace(' ', '_', $grandChildren2->name)) }}">
                                            @foreach($grandChildren2->allItems() as $item)

                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                    @endforeach
                                                        <div style="clear:both"></div>
                                                        @auth
                                                            <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                        @endauth

                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-8 sec-3">
                    @foreach($section3 as $sec3)
                        @if( $sec3->noParent())
                            <div class="field-group">
                                <h3 class="field-group">
                                    {{ $sec3->name  }}
                                </h3>
                                <div class="{{strtolower(str_replace(' ', '_', $sec3->name)) }}">
                                    @foreach($sec3->allItems() as $item)

                                            @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                            @endforeach
                                                <div style="clear:both"></div>
                                                @auth
                                                    <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                @endauth

                                    @endforeach
                                </div>

                                @foreach($sec3->children as $children3)
                                    <h4>
                                        {{ $children3->name }}
                                    </h4>
                                    <div class="{{strtolower(str_replace(' ', '_', $children3->name)) }}">
                                        @foreach($children3->allItems() as $item)

                                                @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                    <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                @endforeach
                                                    <div style="clear:both"></div>
                                                    @auth
                                                        <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                    @endauth

                                        @endforeach
                                    </div>
                                    @foreach($children3->children as $grandChildren3)
                                        <h5>
                                            {{ $grandChildren3->name }}
                                        </h5>
                                        <div class="{{strtolower(str_replace(' ', '_', $grandChildren3->name)) }}">
                                            @foreach($grandChildren3->allItems() as $item)

                                                    @foreach($ItemX->deCode($item->fullContent) as $it_id => $item2)
                                                        <items :item-identity="{{$item->id}}" ref="item-{{$item->id}}"  :items-data="{{ json_encode($ItemX->figureIt($it_id,$item2)) }} "></items>

                                                    @endforeach
                                                        <div style="clear:both"></div>
                                                        @auth
                                                            <a class="badge badge-light" href="/edititem/{{$item->id}}">edit</a>
                                                        @endauth

                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    @endif
        <div class="bottombarrel"><span class="text-center">Resume/resumeCMS created by Bryan James Bassett using Laravel & VueJS</span></div>
  <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <modalpopper ref="mp"></modalpopper>
      </div>
  </div>
    <!--  data-toggle="modal" data-target="#exampleModal" -->
@endsection

