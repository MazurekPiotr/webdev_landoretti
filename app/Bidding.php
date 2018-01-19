<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $table = 'biddings';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function article() {
        return $this->belongsTo('App\Article');
    }
}
