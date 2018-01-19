<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendToLoser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $article;
    public $bid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $article, $bid)
    {
        $this->user = $user;
        $this->article = $article;
        $this->bid = $bid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.sendtoloser')
            ->with(['user' => $this->user, 'article' => $this->article, 'bid' => $this->bid]);
    }
}
