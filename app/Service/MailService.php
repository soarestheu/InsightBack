<?php

namespace App\Service;

use Mail;
use App\Mail\ProofNotification;
use App\Service\Mail\getSendMails;

class MailService
{
    protected $subject;
    protected $type;
    protected $to;

    public function __construct($subject, $type, $to)
    {
       $this->subject = $subject;
       $this->type = $type;
       $this->to = $to;
    }

    public function toSend()
    {
        $mailData = [
            'subject' => $this->subject,
            'type'    => $this->type
        ];
        
        Mail::to($this->to)->send(new \App\Mail\UserNotification($mailData));
        return Mail::failures();
    }
}