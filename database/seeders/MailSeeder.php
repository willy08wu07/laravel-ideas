<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->insert([
            'from' => 1,
            'conten' => Str::random(10),
        ]);
        DB::table('mails')->insert([
            'from' => 2,
            'conten' => Str::random(10),
        ]);
        DB::table('mails')->insert([
            'from' => 1,
            'conten' => Str::random(10),
        ]);
    }
}
