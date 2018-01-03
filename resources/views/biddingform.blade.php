@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open(['url' => 'bid', 'files' => true])}}


        {{ Form::hidden('article_id', $article_id) }}

        <div class="form-group">
            {{ Form::label('price', 'Your bidding:', array('class' => 'required'))  }}
            {{ Form::text('price', old('price'), array('class' => 'form-control')) }}
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        {{ Form::submit('Place your bid', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
@endsection
