<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});

// Home > About
Breadcrumbs::register('auctions', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Auctions', url('/auctions'));
});

Breadcrumbs::register('watchlist', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Watchlist', url('/mywatchlist'));
});

// Home > Blog
Breadcrumbs::register('myauctions', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('My Auctions', view('myauctions'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});