<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $table = 'watchlist';
    public $timestamps;

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
