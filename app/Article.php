<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';
    public $timestamps = false;

    public function getBiddings($id) {
        return Bidding::where('article_id', $id)->get();
    }
}
