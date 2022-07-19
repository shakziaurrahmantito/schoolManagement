<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class teacherAccountMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public $senderInfo;

    public function __construct($data, $senderInfo)
    {
        $this->data = $data;
        $this->senderInfo = $senderInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->senderInfo['subject'])->from($this->senderInfo['from'], $this->senderInfo['alias'])->view('Mail.teacherAccount');
    }
}
