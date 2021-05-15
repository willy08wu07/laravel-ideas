<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Transformers\MailTransformer;
use Illuminate\Http\Request;

class TransformerDemoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $originalMail = Mail::with(['tos'])->firstOrFail();
        $transformedMail = new MailTransformer($originalMail);
        return [
            'comment' => '原始 model 設計失誤，這裡用 transformer 將拼錯的屬性 conten 轉為 content。',
            'originalMail' => $originalMail,
            'transformedMail' => $transformedMail,
            'originalMail["conten"]' => $originalMail['conten'],
            'transformedMail["content"]' => $transformedMail['content'],
        ];
    }
}
