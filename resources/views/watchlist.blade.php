@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('watchlist') }}
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
                <tr>
                    <td><img class="auctionimage" src="{{asset('/img/articles').'/'.$value->article()->first()->photo}}" alt="{{$value->article()->first()->title}}" title="{{$value->article()->first()->title}}"></td>
                    <td>{{$value->article()->first()->title}}</td>
                    <td>{{$value->article()->first()->status}}</td>
                    <td>
                        <a href="./auctions/{{$value->article()->first()->id}}" class="btn btn-primary">More information!</a>
                        <a href="./auctions/{{$value->article()->first()->id}}/edit" class="btn btn-primary">Edit</a>
                        {{ Form::open(array('url' => 'auctions/' . $value->id, 'class' =>'delete')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@stop