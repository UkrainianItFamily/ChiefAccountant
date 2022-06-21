<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserContractEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $userId;
    public $userName;
    public $fromUser;
    public $description;
    public $uploadPath;
    public $fileName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userId, $userName, $fromUser, $description, $uploadPath, $fileName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->fromUser = $fromUser;
        $this->description = $description;
        $this->uploadPath = $uploadPath;
        $this->fileName = $fileName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('pages.mail.personal.contract-to-email')
            ->attach($this->uploadPath, [
                'as' => $this->fileName,
                ])->from($this->fromUser);
    }
}
