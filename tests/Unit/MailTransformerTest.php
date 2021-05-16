<?php

namespace Tests\Unit;

use App\Models\Mail;
use App\Transformers\MailTransformer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MailTransformerTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * @return void
     */
    public function test_transformation()
    {
        /** @var Mail */
        $mail = Mail::with('tos')->firstOrFail();
        $transformedMail = new MailTransformer($mail);
        $this->assertSame($mail->conten, $transformedMail->getContent());
        $this->assertSame($mail->conten, $transformedMail->content);
        $this->assertSame($mail->toArray()['conten'], $transformedMail->toArray()['content']);
        $this->assertSame($mail['conten'], $transformedMail['content']);
        $json = json_encode(
            $transformedMail,
            JSON_FORCE_OBJECT |
            JSON_UNESCAPED_UNICODE |
            JSON_THROW_ON_ERROR
        );
        $this->assertSame(
            $mail->conten,
            json_decode($json, true, flags: JSON_THROW_ON_ERROR)['content'],
        );
    }
}
