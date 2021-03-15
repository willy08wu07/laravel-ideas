<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 充當臨時 controller，未決定要放哪個 controller 的方法就先放這裡。
 */
class TemporaryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return app()->call(static::class . '@getDummyResult');
    }

    public function getDummyResult(Request $request)
    {
        return [
            'dummy-result' => 0,
        ];
    }
}
