<?php

namespace App\Transformers;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Collection;
use App\Models\MailTo;
use Illuminate\Support\Carbon;

class MailTransformer extends BaseTransformer
{
    private $mail;

    public function __construct(Mail $mail) {
        $this->mail = $mail;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->mail->id;
    }

    /**
     * @return int
     */
    public function getFrom() {
        return $this->mail->from;
    }

    /**
     * @return string
     */
    public function getContent() {
        // 修正名稱，包裝過後可以用正確拼字來讀取屬性
        return $this->mail->conten;
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedAt() {
        return $this->mail->created_at;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt() {
        return $this->mail->updated_at;
    }

    /**
     * @return Collection<int, MailTo> 
     */
    public function getTos() {
        return $this->mail->tos;
    }
}
