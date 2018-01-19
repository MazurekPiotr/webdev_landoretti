@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Landoretti
        @endcomponent
    @endslot
    Hey {{ $user->name }} you've bought {{ $article->title }} for {{ $bid->price }}!
    @slot('footer')
        @component('mail::footer')
            © Landoretti
        @endcomponent
    @endslot
@endcomponent