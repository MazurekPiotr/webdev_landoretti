<?php

namespace App\Console\Commands;

use App\Article;
use App\Bidding;
use App\Mail\SendToLoser;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendToBuyerMail;

class SendToBuyer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendtobuyer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $articles = Article::where('status', 'active')->get();
        foreach ($articles as $article) {
            if($article->enddate < Carbon::now() && $article->biddings()->count() > 0) {
                $bid = $article->biddings()->orderBy('price', 'desc')->first();
                $user = User::find($bid->user_id);
                $allbiddings = $article->biddings()->get();
                $allbiddings->forget($bid->id);
                $article->status = 'sold';
                $article->save();

                foreach ($allbiddings as $bidding) {
                    Mail::to($bidding->user()->first()->email)->send(new SendToLoser($bidding->user()->first(), $bidding->article()->first(), $bidding));
                }

                Mail::to($user->email)->send(new SendToBuyerMail($user, $article, $bid));
            }
        }

        $expired = Article::all();
        foreach ($expired as $article) {
            if($article->enddate < Carbon::now() && $article->status != 'sold') {
                $article->status = 'expired';
                $article->save();
            }
        }
    }
}
