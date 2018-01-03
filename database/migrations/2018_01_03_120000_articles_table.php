<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("title");
            $table->string("style");
            $table->year("year");
            $table->integer("width");
            $table->integer("height");
            $table->integer("depth");
            $table->longText("description");
            $table->longText("condition");
            $table->string("photo");
            $table->string("color");
            $table->integer("min_price");
            $table->integer("max_price");
            $table->integer("buyout_price");
            $table->date("startdate");
            $table->date("enddate");
            $table->enum("status" , [ 'active', 'expired', 'sold' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("articles");
    }
}
