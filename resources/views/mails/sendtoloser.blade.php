@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Landoretti
        @endcomponent
    @endslot
    Hey {{ $user->name }} sadly you didn't give enough money for {{ $article->title }}!
    @slot('footer')
        @component('mail::footer')
            © Landoretti
        @endcomponent
    @endslot
@endcomponent