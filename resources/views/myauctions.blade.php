@extends('layouts.app')

@section('content')
    <h1>Your Auctions:</h1>
    <h2>Active:</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $key => $value)
            @if($value->status == 'active')
            <tr>
                <td><img class="auctionimage" src="{{asset('/img/articles').'/'.$value->photo}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
                <td>{{$value->title}}</td>
                <td>{{$value->status}}</td>
                <td>
                    <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                    <a href="./auctions/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                    {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <h2>Sold</h2>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $key => $value)
        @if($value->status == 'sold')
        <tr>
            <td><img class="auctionimage" src="{{asset('/img/articles').'/'.$value->photo}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
            <td>{{$value->title}}</td>
            <td>{{$value->status}}</td>
            <td>
                <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                <a href="./auctions/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
    </table>
    <h2>Expired</h2>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $key => $value)
        @if($value->status == 'expired')
        <tr>
            <td><img class="auctionimage" src="{{asset('/img/articles').'/'.$value->photo}}" alt="{{$value->title}}" title="{{$value->title}}"></td>
            <td>{{$value->title}}</td>
            <td>{{$value->status}}</td>
            <td>
                <a href="./auctions/{{$value->id}}" class="btn btn-primary">More information!</a>
                <a href="./auctions/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
    </table>
@endsection
