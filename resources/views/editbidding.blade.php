@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open(['url' => 'editBid', 'files' => true])}}


        {{ Form::hidden('bid_id', $bidding->id) }}

        <div class="form-group">
            {{ Form::label('price', 'Your bidding:', array('class' => 'required'))  }}
            {{ Form::text('price', old('price'), array('class' => 'form-control')) }}
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        {{ Form::submit('Edit your bid', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
@endsection
