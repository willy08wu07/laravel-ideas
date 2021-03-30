<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MailTo
 *
 * @property int $id
 * @property int $mail_id
 * @property int $to
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo whereMailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailTo whereTo($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Mail $mail
 */
class MailTo extends Model
{
    use HasFactory;

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }
}
