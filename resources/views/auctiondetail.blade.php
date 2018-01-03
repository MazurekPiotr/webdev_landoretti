@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4 imagecol"><img src="{{asset("/img/articles")."/".$article->photo}}" alt="{{$article->title}}" title="{{$article->title}}"></div>
        <div class="col-sm-4">
            <h1>{{$article->title}}</h1>
            <p><strong>Style:</strong> {{$article->style}}</p>
            <p><strong>Year:</strong> {{$article->year}}</p>
            <p><strong>Width:</strong> {{$article->width}}</p>
            <p><strong>Height:</strong> {{$article->height}}</p>
            <p><strong>Depth:</strong> {{$article->depth}}</p>
            <p><strong>Description:</strong> {{$article->description}}</p>
            <p><strong>Condition:</strong> {{$article->condition}}</p>
            <p><strong>Color:</strong> {{$article->origin}}</p>
            <p><strong>Minimumprice:</strong> {{$article->min_price}}</p>
            <p><strong>Maxmimumprice:</strong> {{$article->max_price}}</p>
            <p><strong>Buyoutprice:</strong> {{$article->buyout_price}}</p>
            <p><strong>Enddate:</strong> {{$article->enddate}}</p>
            <a href="../auctionbidding/{{$article->id}}" class="btn btn-primary">Bid!</a>
            <a href="../auctionbuynow/{{$article->id}}" class="btn btn-primary">BUY NOW!</a>
        </div>
    </div>
    <div class="container comments">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Biddings:</h2>
                </div>
                <div class="comments-list">
                    @if(count($article->getBiddings($article->id))==0)
                        <p>There are no biddings yet.</p>
                    @endif
                    @foreach($article->getBiddings($article->id) as $key => $value)
                    <div class="media">
                            <h4 class="media-heading user_name"><strong>{{$value->name}}</strong></h4>
                            € {{$value->price}}
                        </div>
                    </div>
                @endforeach
                </div>



            </div>
        </div>
@endsection
