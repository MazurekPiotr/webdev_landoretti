@extends('layouts.app')

@section('content')
    <h1 id="welcome">{{ __('messages.welcome') }}</h1>
    <div class="carousel-inner">
        {{ Breadcrumbs::render('home') }}
    </div>
@endsection
