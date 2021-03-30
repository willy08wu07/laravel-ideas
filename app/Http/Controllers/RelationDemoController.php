<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelationDemoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return app()->call(static::class . '@relationSql');
    }

    public function relationSql(Request $request, Mail $mails)
    {
        DB::enableQueryLog();
        $r = $mails->whereHas('tos', function (Builder $query) {
        })->get();
        $r = $mails->with('tos')->get();
        return DB::getQueryLog();
    }
}
